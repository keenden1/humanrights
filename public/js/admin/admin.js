function toggleMenu() {
    const sidebar = document.getElementById('sidebars');
    sidebar.classList.toggle('active');
  }
  
function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
  }


document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.toggle-menu');

    menuItems.forEach(function (menuItem) {
        const childMenu = menuItem.nextElementSibling;
        if (childMenu) {
            childMenu.style.display = 'none'; 
        }
        menuItem.addEventListener('click', function () {

            if (childMenu.style.display === 'none' || childMenu.style.display === '') {
                childMenu.style.display = 'block';
            } else {
                childMenu.style.display = 'none'; 
            }
        });
    });
});
