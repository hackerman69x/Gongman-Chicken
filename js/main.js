let menu = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menu.addEventListener("click", function () {
    navbar.classList.toggle("active");
});

window.onscroll = () => {
    navbar.classList.remove("active")
};

document.addEventListener("DOMContentLoaded", function() {
    // Get all food category containers
    const chickenFoods = document.getElementById("chicken-foods");
    const appetizerFoods = document.getElementById("appetizer-foods");
    const soupFoods = document.getElementById("soup-foods");

    // Get all category headers
    const chickenHeader = document.getElementById("chicken-header");
    const appetizerHeader = document.getElementById("appetizer-header");
    const soupHeader = document.getElementById("soup-header");

    // Function to handle clicking on the navbox links
    function handleNavboxClick(event, category, header) {
        event.preventDefault(); // Prevent default link behavior
        category.scrollIntoView({ behavior: "smooth", block: "start" }); // Scroll to the category
        header.style.display = "block"; // Show the category header
    }

    // Add event listeners to navbox links
    document.getElementById("chicken-box").addEventListener("click", function(event) {
        handleNavboxClick(event, chickenFoods, chickenHeader);
    });

    document.getElementById("appetizer-box").addEventListener("click", function(event) {
        handleNavboxClick(event, appetizerFoods, appetizerHeader);
    });

    document.getElementById("soup-box").addEventListener("click", function(event) {
        handleNavboxClick(event, soupFoods, soupHeader);
    });

    // Show the full menu by default
    chickenFoods.style.display = "grid";
    appetizerFoods.style.display = "grid";
    soupFoods.style.display = "grid";

    // Add smooth scrolling when clicking on return to top icon
    document.getElementById('return-to-top').addEventListener('click', function(e) {
        e.preventDefault();
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;
    });

    // Show or hide the return to top icon based on scroll position
    window.addEventListener('scroll', function() {
        if (document.documentElement.scrollTop > 100 || document.body.scrollTop > 100) {
            document.getElementById('return-to-top').classList.add('show');
        } else {
            document.getElementById('return-to-top').classList.remove('show');
        }
    });
    
});