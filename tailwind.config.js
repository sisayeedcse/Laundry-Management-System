/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./app/Livewire/**/*.php",
        "./app/View/Components/**/*.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#0d9488",
                    50:  "#f0fdfa",
                    100: "#ccfbf1",
                    200: "#99f6e4",
                    300: "#5eead4",
                    400: "#2dd4bf",
                    500: "#14b8a6",
                    600: "#0d9488",
                    700: "#0f766e",
                    800: "#115e59",
                    900: "#134e4a",
                    950: "#042f2e",
                },
                gold: {
                    DEFAULT: "#f59e0b",
                    50:  "#fffbeb",
                    100: "#fef3c7",
                    200: "#fde68a",
                    300: "#fcd34d",
                    400: "#fbbf24",
                    500: "#f59e0b",
                    600: "#d97706",
                    700: "#b45309",
                    800: "#92400e",
                    900: "#78350f",
                },
                surface: {
                    DEFAULT: "#111827",
                    50: "#1f2937",
                    100: "#374151",
                    200: "#4b5563",
                },
            },
            fontFamily: {
                sans: ["'Plus Jakarta Sans'", "Inter", "system-ui", "sans-serif"],
            },
            backgroundImage: {
                "sidebar-gradient": "linear-gradient(180deg, #0a1628 0%, #060d1a 50%, #030712 100%)",
                "card-gradient": "linear-gradient(135deg, rgba(255,255,255,0.04) 0%, rgba(255,255,255,0.01) 100%)",
                "gold-gradient": "linear-gradient(135deg, #f59e0b 0%, #d97706 100%)",
                "teal-gradient": "linear-gradient(135deg, #0d9488 0%, #0f766e 100%)",
                "danger-gradient": "linear-gradient(135deg, #f43f5e 0%, #e11d48 100%)",
                "success-gradient": "linear-gradient(135deg, #10b981 0%, #059669 100%)",
            },
            boxShadow: {
                "glow-teal": "0 0 20px rgba(13,148,136,0.3)",
                "glow-gold": "0 0 20px rgba(245,158,11,0.3)",
                "glow-red": "0 0 20px rgba(244,63,94,0.3)",
                "card": "0 4px 6px -1px rgba(0,0,0,0.4), 0 2px 4px -2px rgba(0,0,0,0.3)",
                "card-hover": "0 10px 25px -5px rgba(0,0,0,0.5), 0 8px 10px -6px rgba(0,0,0,0.4)",
            },
            animation: {
                "fade-in": "fadeIn 0.3s ease-out",
                "slide-up": "slideUp 0.4s ease-out",
                "pulse-glow": "pulseGlow 2s ease-in-out infinite",
                "shimmer": "shimmer 2s linear infinite",
            },
            keyframes: {
                fadeIn: {
                    "0%": { opacity: "0", transform: "translateY(-8px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                slideUp: {
                    "0%": { opacity: "0", transform: "translateY(16px)" },
                    "100%": { opacity: "1", transform: "translateY(0)" },
                },
                pulseGlow: {
                    "0%, 100%": { boxShadow: "0 0 10px rgba(13,148,136,0.3)" },
                    "50%": { boxShadow: "0 0 25px rgba(13,148,136,0.6)" },
                },
                shimmer: {
                    "0%": { backgroundPosition: "-200% 0" },
                    "100%": { backgroundPosition: "200% 0" },
                },
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
