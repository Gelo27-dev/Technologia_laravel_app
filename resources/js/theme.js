// Theme helper: show an entrance switcher once after login and add navbar white toggle
(function () {
    const ThemeHelper = {
        init() {
            try {
                const ref = (document.referrer || "").toLowerCase();
                const shown = localStorage.getItem("themeSwitcherShown");
                if (
                    !shown &&
                    (ref.indexOf("/login") !== -1 ||
                        ref.indexOf("/auth") !== -1)
                ) {
                    localStorage.setItem("themeSwitcherShown", "true");
                    window.dispatchEvent(new CustomEvent("showThemeSwitcher"));
                }
            } catch (e) {}

            // toggle white navbar when elements marked with data-navbar-toggle are clicked
            document.addEventListener("click", (ev) => {
                const btn =
                    ev.target.closest &&
                    ev.target.closest("[data-navbar-toggle]");
                if (btn) {
                    document.body.classList.toggle("navbar-white-open");
                }
            });

            // remove white navbar when clicking outside nav/menu (small delay)
            document.addEventListener("click", (ev) => {
                const inside =
                    ev.target.closest &&
                    ev.target.closest("nav, .mobile-menu, .dropdown-menu");
                if (
                    !inside &&
                    document.body.classList.contains("navbar-white-open")
                ) {
                    setTimeout(
                        () =>
                            document.body.classList.remove("navbar-white-open"),
                        140
                    );
                }
            });
        },
    };

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", () => ThemeHelper.init());
    } else {
        ThemeHelper.init();
    }
    window.ThemeHelper = ThemeHelper;
})();
