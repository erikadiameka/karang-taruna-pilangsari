import "./bootstrap";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import AOS from "aos";
import "aos/dist/aos.css";
import "flowbite";

Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 800,
        easing: "ease-out-cubic",
        once: true,
        offset: 50,
    });

    // Navbar scroll
    const navbar = document.getElementById("main-navbar");
    if (navbar) {
        window.addEventListener("scroll", () => {
            navbar.classList.toggle("navbar-scrolled", window.scrollY > 50);
        });
    }

    // Animated counter
    const counters = document.querySelectorAll("[data-counter]");
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.counter);
                    let current = 0;
                    const step = target / 60;
                    const timer = setInterval(() => {
                        current = Math.min(current + step, target);
                        entry.target.textContent = Math.floor(current) + "+";
                        if (current >= target) clearInterval(timer);
                    }, 30);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 },
    );
    counters.forEach((c) => observer.observe(c));
});
