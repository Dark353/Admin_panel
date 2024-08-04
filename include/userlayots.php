
<div class="right-section">
    <div class="nav">
        <button id="menu-btn">
            <span class="material-icons-sharp">
                menu
            </span>
        </button>
        <div class="dark-mode">
            <span class="material-icons-sharp">
                light_mode
            </span>
            <span class="material-icons-sharp active">
                dark_mode
            </span>
        </div>

        <div class="profile">
            <div class="info">
                
            <p> <b><?php echo $_SESSION['isim'];?></b></p>
                        <small class="text-muted"><?php echo $_SESSION['is_admin'];?></small>
            </div>
            <div class="profile-photo">
                <img src="./assets/img/tenor.gif">
            </div>
        </div>

    </div>
    <!-- End of Nav -->



</div>