# 🎨 Personalización Completa de theme.json - Black Emerald Theme

## 📋 INFORMACIÓN BÁSICA DEL TEMA

```json
// RELLENA ESTA SECCIÓN CON LOS DATOS DE TU TEMA
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 2,
  "title": "Black Emerald",                    // Nombre público del tema
  "name": "blackemerald",                     // Slug interno del tema
  "description": "Fast. Simple. Elegant.", // Descripción
  "template": "html",
  "domain": "blackemerald"                    // Text domain para traducciones
}
```

## 🎨 PALETA DE COLORES PERSONALIZADA

### 🟦 COLORES PRIMARIOS (Reemplaza los valores HEX)
```json
{
  "settings": {
    "color": {
      "palette": [
        {
          "name": "Primary",                  // Nombre del color
          "slug": "primary",                  // Slug (sin espacios)
          "color": "#1F2A33"                   // Color HEX (azul por defecto)
        },
        {
          "name": "Secondary", 
          "slug": "secondary", 
          "color": "#0081E5"                   // Color HEX (naranja por defecto)
        },
        {
          "name": "Accent",
          "slug": "accent",
          "color": "#0081E5"                   // Color HEX (azul claro por defecto)
        },
        {
          "name": "Success",
          "slug": "success",
          "color": "#00CC92"                   // Color HEX (verde por defecto)
        },
        {
          "name": "Warning",
          "slug": "warning",
          "color": "#E5C700"                   // Color HEX (ámbar por defecto)
        },
        {
          "name": "Error",
          "slug": "error",
          "color": "#E54563"                   // Color HEX (rojo por defecto)
        }
      ]
    }
  }
}
```

### ⚫️ COLORES NEUTROS (Escala de grises personalizada)
```json
{
  "settings": {
    "color": {
      "palette": [
        {
          "name": "Black",
          "slug": "black",
          "color": "#000000"                   // Negro puro
        },
        {
          "name": "White",
          "slug": "white",
          "color": "#FFFFFF"                   // Blanco puro
        },
        {
          "name": "Gray 50",
          "slug": "gray-50",
          "color": "#F9FAFB"                   // Gris muy claro
        },
        {
          "name": "Gray 100",
          "slug": "gray-100",
          "color": "#F3F4F6"
        },
        {
          "name": "Gray 200",
          "slug": "gray-200",
          "color": "#E5E7EB"
        },
        {
          "name": "Gray 300",
          "slug": "gray-300",
          "color": "#D1D5DB"
        },
        {
          "name": "Gray 400",
          "slug": "gray-400",
          "color": "#9CA3AF"
        },
        {
          "name": "Gray 500",
          "slug": "gray-500",
          "color": "#6B7280"
        },
        {
          "name": "Gray 600",
          "slug": "gray-600",
          "color": "#4B5563"
        },
        {
          "name": "Gray 700",
          "slug": "gray-700",
          "color": "#374151"
        },
        {
          "name": "Gray 800",
          "slug": "gray-800",
          "color": "#1F2937"
        },
        {
          "name": "Gray 900",
          "slug": "gray-900",
          "color": "#111827"                   // Gris muy oscuro
        }
      ]
    }
  }
}
```

## 🔤 TIPOGRAFÍA Y FUENTES

### 📏 TAMAÑOS DE FUENTE (Personaliza según necesidades)
```json
{
  "settings": {
    "typography": {
      "fontSizes": [
        {
          "name": "Extra Small",
          "slug": "xs",
          "size": "0.75rem"                    // 12px
        },
        {
          "name": "Small",
          "slug": "sm",
          "size": "0.875rem"                   // 14px
        },
        {
          "name": "Base",
          "slug": "base",
          "size": "1rem"                       // 16px
        },
        {
          "name": "Large",
          "slug": "lg",
          "size": "1.125rem"                   // 18px
        },
        {
          "name": "Extra Large",
          "slug": "xl",
          "size": "1.25rem"                    // 20px
        },
        {
          "name": "2XL",
          "slug": "2xl",
          "size": "1.5rem"                     // 24px
        },
        {
          "name": "3XL",
          "slug": "3xl",
          "size": "1.875rem"                   // 30px
        },
        {
          "name": "4XL",
          "slug": "4xl",
          "size": "2.25rem"                    // 36px
        },
        {
          "name": "5XL",
          "slug": "5xl",
          "size": "3rem"                       // 48px
        },
        {
          "name": "6XL",
          "slug": "6xl",
          "size": "3.75rem"                    // 60px
        }
      ]
    }
  }
}
```

### 🖋️ FUENTES PERSONALIZADAS (Google Fonts o fuentes locales)
```json
{
  "settings": {
    "typography": {
      "fontFamilies": [
        {
          "name": "Roboto",                     // Nombre de la fuente
          "slug": "Roboto",                     // Slug para usar en clases
          "fontFamily": "'Roboto', sans-serif",  // Declaración CSS de la fuente
          "fontFace": [
            {
              "fontFamily": "Roboto",
              "fontStyle": "normal",
              "fontWeight": "400",
              "src": ["https://fonts.googleapis.com/css2?family=Roboto:ital,wdth,wght@0,75..100,100..900;1,75..100,100..900&display=swap"]
            }
          ]
        },
        {
          "name": "Sunflower",
          "slug": "Sunflower",
          "fontFamily": "'Sunflower', sans-serif",
          "fontFace": [
            {
              "fontFamily": "Sunflower",
              "fontStyle": "normal",
              "fontWeight": "400",
              "src": ["https://fonts.googleapis.com/css2?family=Sunflower:wght@300;500;700&display=swap"]
            }
          ]
        }
      ]
    }
  }
}
```

## 📏 ESPACIADO Y LAYOUT

### 📐 ESCALA DE ESPACIADO (Personaliza los valores)
```json
{
  "settings": {
    "spacing": {
      "spacingScale": {
        "operator": "*",                       // Operador: "*" (multiplicación) o "+" (suma)
        "increment": 1.5,                      // Factor de incremento
        "steps": 8                             // Número de pasos en la escala
      },
      "spacingSizes": [
        {
          "name": "0",
          "slug": "0",
          "size": "0px"
        },
        {
          "name": "1",
          "slug": "1",
          "size": "0.25rem"                    // 4px
        },
        {
          "name": "2",
          "slug": "2",
          "size": "0.5rem"                     // 8px
        },
        {
          "name": "3",
          "slug": "3",
          "size": "0.75rem"                    // 12px
        },
        {
          "name": "4",
          "slug": "4",
          "size": "1rem"                       // 16px
        },
        {
          "name": "5",
          "slug": "5",
          "size": "1.25rem"                    // 20px
        },
        {
          "name": "6",
          "slug": "6",
          "size": "1.5rem"                     // 24px
        },
        {
          "name": "8",
          "slug": "8",
          "size": "2rem"                       // 32px
        },
        {
          "name": "10",
          "slug": "10",
          "size": "2.5rem"                     // 40px
        },
        {
          "name": "12",
          "slug": "12",
          "size": "3rem"                       // 48px
        },
        {
          "name": "16",
          "slug": "16",
          "size": "4rem"                       // 64px
        },
        {
          "name": "20",
          "slug": "20",
          "size": "5rem"                       // 80px
        },
        {
          "name": "24",
          "slug": "24",
          "size": "6rem"                       // 96px
        },
        {
          "name": "32",
          "slug": "32",
          "size": "8rem"                       // 128px
        },
        {
          "name": "40",
          "slug": "40",
          "size": "10rem"                      // 160px
        },
        {
          "name": "48",
          "slug": "48",
          "size": "12rem"                      // 192px
        },
        {
          "name": "56",
          "slug": "56",
          "size": "14rem"                      // 224px
        },
        {
          "name": "64",
          "slug": "64",
          "size": "16rem"                      // 256px
        }
      ]
    }
  }
}
```

### 📱 BREAKPOINTS RESPONSIVE
```json
{
  "settings": {
    "layout": {
      "contentSize": "900px",                 // Ancho máximo del contenido
      "wideSize": "1120px",                   // Ancho máximo para layout wide
      "breakpoints": {
        "mobile": "480px",                    // Breakpoint móvil
        "tablet": "768px",                    // Breakpoint tablet
        "desktop": "1024px",                  // Breakpoint desktop
        "large": "1280px"                     // Breakpoint desktop grande
      }
    }
  }
}
```

## 🎛️ CONFIGURACIÓN DE BLOQUES

### ⚙️ CONFIGURACIÓN GLOBAL DE BLOQUES
```json
{
  "settings": {
    "blocks": {
      "core/button": {
        "color": {
          "palette": ["primary", "secondary", "accent", "black", "white", "gray-600"]
        },
        "typography": {
          "fontSizes": ["sm", "base", "lg", "xl"]
        }
      },
      "core/heading": {
        "color": {
          "palette": ["black", "gray-800", "gray-900", "primary", "secondary"]
        },
        "typography": {
          "fontSizes": ["xl", "2xl", "3xl", "4xl", "5xl", "6xl"],
          "fontFamilies": ["inter", "playfair"]
        }
      },
      "core/paragraph": {
        "color": {
          "palette": ["black", "gray-700", "gray-600", "gray-800"]
        },
        "typography": {
          "fontSizes": ["xs", "sm", "base", "lg"],
          "fontFamilies": ["inter"]
        }
      },
      "core/group": {
        "color": {
          "palette": ["primary", "secondary", "accent", "gray-100", "gray-200"]
        }
      },
      "core/columns": {
        "layout": {
          "default": {
            "type": "flex",
            "flexWrap": "wrap",
            "justifyContent": "space-between"
          }
        }
      }
    }
  }
}
```

## 🎨 ESTILOS GLOBALES

### 🎯 VARIABLES CSS PERSONALIZADAS
```json
{
  "styles": {
    "color": {
      "background": "#FFFFFF",               // Color de fondo global
      "text": "#1F2A33"                      // Color de texto global
    },
    "typography": {
      "fontFamily": "'Roboto', sans-serif",    // Fuente global
      "fontSize": "1rem",                     // Tamaño de fuente base
      "lineHeight": "1.6",                    // Altura de línea
      "fontWeight": "400"                     // Grosor de fuente
    },
    "elements": {
      "link": {
        "color": {
          "text": "var(--wp--preset--color--primary)"
        },
        ":hover": {
          "color": {
            "text": "var(--wp--preset--color--secondary)"
          }
        }
      },
      "heading": {
        "color": {
          "text": "var(--wp--preset--color--primary)"
        },
        "typography": {
          "fontFamily": "var(--wp--preset--font-family--sunflower)",
          "fontWeight": "700",
          "lineHeight": "1.2"
        }
      },
      "button": {
        "color": {
          "background": "var(--wp--preset--color--primary)",
          "text": "var(--wp--preset--color--white)"
        },
        ":hover": {
          "color": {
            "background": "var(--wp--preset--color--secondary)"
          }
        }
      }
    }
  }
}
```

### 🌑 SOMBRAS AND EFECTOS
```json
{
  "styles": {
    "shadow": {
      "preset": [
        {
          "name": "Small",
          "slug": "sm",
          "shadow": "0 1px 2px 0 rgba(0, 0, 0, 0.05)"
        },
        {
          "name": "Medium",
          "slug": "md",
          "shadow": "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)"
        },
        {
          "name": "Large",
          "slug": "lg",
          "shadow": "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)"
        },
        {
          "name": "X-Large",
          "slug": "xl",
          "shadow": "0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)"
        },
        {
          "name": "Inner",
          "slug": "inner",
          "shadow": "inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)"
        }
      ]
    }
  }
}
```

## 📱 CONFIGURACIÓN RESPONSIVE

### 📲 MEDIA QUERIES PERSONALIZADAS
```json
{
  "settings": {
    "custom": {
      "responsive": {
        "mobile": "@media (max-width: 480px)",
        "tablet": "@media (max-width: 768px)",
        "desktop": "@media (min-width: 1024px)",
        "large": "@media (min-width: 1280px)",
        "xlarge": "@media (min-width: 1536px)"
      }
    }
  }
}
```

## 🛠️ UTILIDADES Y CLASES CSS

### 🎨 CLASES DE UTILIDAD PERSONALIZADAS
```json
{
  "settings": {
    "custom": {
      "utilities": {
        "text-gradient": {
          "background": "linear-gradient(45deg, var(--wp--preset--color--primary), var(--wp--preset--color--secondary))",
          "backgroundClip": "text",
          "webkitBackgroundClip": "text",
          "color": "transparent"
        },
        "glass-effect": {
          "background": "rgba(255, 255, 255, 0.25)",
          "backdropFilter": "blur(10px)",
          "border": "1px solid rgba(255, 255, 255, 0.18)"
        },
        "border-glow": {
          "boxShadow": "0 0 0 1px var(--wp--preset--color--primary), 0 0 20px rgba(45, 91, 255, 0.3)"
        }
      }
    }
  }
}
```

## 🎯 ESTRUCTURA FINAL RECOMENDADA

```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 2,
  "title": "Black Emerald",
  "name": "blackemerald",
  "description": "Tema personalizado con diseño moderno y responsive",
  
  "settings": {
    "color": { /* 🎨 Paleta de colores */ },
    "typography": { /* 🔤 Tipografía */ },
    "spacing": { /* 📏 Espaciado */ },
    "layout": { /* 📐 Layout */ },
    "blocks": { /* 🎛️ Configuración de bloques */ },
    "custom": { /* 🛠️ Utilidades personalizadas */ }
  },
  
  "styles": {
    "color": { /* 🎯 Colores globales */ },
    "typography": { /* 📝 Tipografía global */ },
    "elements": { /* 🔗 Elementos específicos */ },
    "shadow": { /* 🌑 Sombras */ }
  }
}
```

## ✅ INSTRUCCIONES DE USO

1. **COPIA** cada sección que quieras personalizar
2. **REEMPLAZA** los valores por defecto con tus preferencias
3. **PEGA** en tu archivo `theme.json` actual
4. **PRUEBA** cada cambio en el editor de WordPress
5. **AJUSTA** según los resultados visuales

## 🚀 PRÓXIMOS PASOS

1. **Comienza con los colores** - Define tu paleta principal
2. **Configura tipografía** - Elige fuentes y tamaños
3. **Ajusta espaciado** - Define tu escala de espacios
4. **Personaliza bloques** - Configura cada tipo de bloque
5. **Agrega estilos globales** - Define el look & feel general

¿Necesitas ayuda con alguna sección específica o prefieres que empecemos por algún área en particular?