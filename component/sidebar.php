  
<nav class="sidebar">
    <ul>
        <a href='home.php'><li><i class='bx bx-home-alt'></i>Home</li></a>
        <a href='completed.php'><li><i class='bx bxs-check-square'></i>Completed</li></a>
        <a href='login.php?log-out'><li><i class='bx bx-log-out'></i>Logout</li></a>
    </ul>
    <i class='bx bx-chevron-left'></i>
</nav>

<script>
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('.bx-chevron-left');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
</script>

    
