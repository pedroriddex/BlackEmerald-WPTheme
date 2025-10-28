class BlackEmeraldSPA {
    constructor() {
        this.currentPage = null;
        this.isLoading = false;
        this.init();
    }

    init() {
        console.log('Black Emerald SPA initialized');
        this.setupNavigation();
        this.setupEventListeners();
        this.handleInitialLoad();
    }

    setupNavigation() {
        // Interceptar clicks en enlaces internos
        document.addEventListener('click', (e) => {
            const link = e.target.closest('a');
            if (link && this.isInternalLink(link.href)) {
                e.preventDefault();
                this.navigateTo(link.href);
            }
        });

        // Manejar navegación del browser (back/forward)
        window.addEventListener('popstate', () => {
            this.loadPage(window.location.href, true);
        });
    }

    setupEventListeners() {
        // Escuchar cambios en el contenido dinámico
        this.setupContentObservers();
    }

    setupContentObservers() {
        // Observer para re-configurar eventos en contenido cargado dinámicamente
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'childList') {
                    this.rebindDynamicContent();
                }
            });
        });

        const main = document.querySelector('main');
        if (main) {
            observer.observe(main, { childList: true, subtree: true });
        }
    }

    rebindDynamicContent() {
        // Re-configurar eventos para contenido cargado dinámicamente
        const dynamicLinks = document.querySelectorAll('main a');
        dynamicLinks.forEach(link => {
            if (this.isInternalLink(link.href) && !link.hasAttribute('data-spa-bound')) {
                link.setAttribute('data-spa-bound', 'true');
                link.addEventListener('click', (e) => {
                    if (this.isInternalLink(link.href)) {
                        e.preventDefault();
                        this.navigateTo(link.href);
                    }
                });
            }
        });
    }

    async navigateTo(url, isPopState = false) {
        if (this.isLoading) return;

        this.showLoading();
        
        if (!isPopState) {
            history.pushState({ url }, '', url);
        }

        try {
            await this.loadPage(url);
        } catch (error) {
            console.error('Navigation error:', error);
            // Fallback to traditional navigation
            window.location.href = url;
        } finally {
            this.hideLoading();
        }
    }

    async loadPage(url) {
        this.isLoading = true;
        
        try {
            const slug = this.getSlugFromUrl(url);
            const pageData = await this.fetchPageData(slug);
            
            if (pageData) {
                this.updateContent(pageData.content);
                this.updateDocumentTitle(pageData.title);
                this.updateMetaTags(pageData);
                this.scrollToTop();
                
                // Actualizar URL actual
                this.currentPage = {
                    url: url,
                    slug: slug,
                    title: pageData.title
                };
                
                console.log('Page loaded successfully:', slug);
            } else {
                throw new Error('Page not found');
            }
        } catch (error) {
            console.error('Error loading page:', error);
            throw error;
        } finally {
            this.isLoading = false;
        }
    }

    async fetchPageData(slug) {
        try {
            // Primero intentar con páginas
            let response = await fetch(`${spaData.rest_url}wp/v2/pages?slug=${slug}&_embed`);
            let data = await response.json();
            
            if (data && data.length > 0) {
                return {
                    title: data[0].title.rendered,
                    content: data[0].content.rendered,
                    type: 'page'
                };
            }
            
            // Si no es página, intentar con posts
            response = await fetch(`${spaData.rest_url}wp/v2/posts?slug=${slug}&_embed`);
            data = await response.json();
            
            if (data && data.length > 0) {
                return {
                    title: data[0].title.rendered,
                    content: data[0].content.rendered,
                    type: 'post'
                };
            }
            
            return null;
            
        } catch (error) {
            console.error('Fetch error:', error);
            throw error;
        }
    }

    updateContent(html) {
        const main = document.querySelector('main');
        if (main) {
            // Animación de fade out/in
            main.style.opacity = '0';
            
            setTimeout(() => {
                main.innerHTML = html;
                main.style.opacity = '1';
                
                // Re-configurar eventos para el nuevo contenido
                this.rebindDynamicContent();
                
                // Disparar evento personalizado para que otros scripts sepan que el contenido cambió
                window.dispatchEvent(new CustomEvent('spaContentLoaded', {
                    detail: { page: this.currentPage }
                }));
                
            }, 200);
        }
    }

    updateDocumentTitle(title) {
        document.title = `${title} - ${spaData.siteName || 'Black Emerald'}`;
    }

    updateMetaTags(pageData) {
        // Actualizar meta description si está disponible
        const metaDescription = document.querySelector('meta[name="description"]');
        if (metaDescription && pageData.excerpt) {
            metaDescription.setAttribute('content', pageData.excerpt);
        }
        
        // Actualizar OG tags para redes sociales
        this.updateOpenGraphTags(pageData);
    }

    updateOpenGraphTags(pageData) {
        const ogTitle = document.querySelector('meta[property="og:title"]');
        const ogDescription = document.querySelector('meta[property="og:description"]');
        const ogUrl = document.querySelector('meta[property="og:url"]');
        
        if (ogTitle) ogTitle.setAttribute('content', pageData.title);
        if (ogDescription && pageData.excerpt) {
            ogDescription.setAttribute('content', pageData.excerpt);
        }
        if (ogUrl) ogUrl.setAttribute('content', window.location.href);
    }

    showLoading() {
        // Crear o mostrar indicador de carga
        let loader = document.getElementById('spa-loader');
        if (!loader) {
            loader = document.createElement('div');
            loader.id = 'spa-loader';
            loader.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 3px;
                background: linear-gradient(90deg, #007cba, #00a0d2);
                z-index: 9999;
                animation: loading 1s infinite;
            `;
            document.body.appendChild(loader);
        }
        loader.style.display = 'block';
    }

    hideLoading() {
        const loader = document.getElementById('spa-loader');
        if (loader) {
            loader.style.display = 'none';
        }
    }

    scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    isInternalLink(url) {
        try {
            const linkUrl = new URL(url, window.location.origin);
            return linkUrl.origin === window.location.origin && 
                   !url.includes('#') && 
                   !url.includes('wp-admin') &&
                   !url.includes('wp-login') &&
                   !url.includes('.pdf') &&
                   !url.includes('.doc') &&
                   !url.includes('.zip');
        } catch {
            return false;
        }
    }

    getSlugFromUrl(url) {
        try {
            const urlObj = new URL(url);
            const path = urlObj.pathname;
            // Remover slash inicial y extensiones
            return path.replace(/^\//, '').replace(/\/$/, '').split('/').pop() || 'home';
        } catch {
            return 'home';
        }
    }

    handleInitialLoad() {
        // Configurar la página actual al cargar
        this.currentPage = {
            url: window.location.href,
            slug: this.getSlugFromUrl(window.location.href),
            title: document.title
        };
        
        console.log('Initial page:', this.currentPage);
    }
}

// Inicializar SPA cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
    if (typeof spaData !== 'undefined') {
        window.blackEmeraldSPA = new BlackEmeraldSPA();
    }
});

// Estilos para la animación de carga
const loaderStyles = document.createElement('style');
loaderStyles.textContent = `
    @keyframes loading {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    main {
        transition: opacity 0.3s ease-in-out;
    }
`;
document.head.appendChild(loaderStyles);