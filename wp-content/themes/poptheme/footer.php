<footer>

    <?php wp_footer() ?>


    <p>Copyright &copy; <?= date('Y') ?> - All right reserved</p>
    <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>
</footer>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const hamburger = document.querySelector(".hamburger");
        const navbar = document.querySelector(".navbar");
        const dropdowns = document.querySelectorAll(".menu-item-has-children");

        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navbar.classList.toggle("active");
        });

        dropdowns.forEach((dropdown) => {
            const link = dropdown.querySelector("a");
            link.addEventListener("click", (e) => {
                e.preventDefault();
                dropdown.classList.toggle("active");
            });
        });
    });
</script>
</body>

</html>