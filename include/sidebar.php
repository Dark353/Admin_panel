<aside>
    <div class="toggle">
        <div class="logo">
            <img src="./assets/img/dark-logo.jpg">


        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">
                close
            </span>
        </div>
    </div>

    <div class="sidebar">
        <a href="index.php">
            <span class="material-icons-sharp">
                dashboard
            </span>
            <h3>Anasayfa</h3>
        </a>
        <?php
                if ($_SESSION['is_admin'] & YetkiKontrol::KREAD) {
    echo '<a href="kull_list.php">
            <span class="material-icons-sharp">
                person_outline
            </span>
            <h3>Kullanıcılar</h3>
          </a>';
        }

        if ( $_SESSION['is_admin'] & YetkiKontrol::HREAD) {
            echo '<a href="haber_list.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Haberler</h3>
                  </a>';
                }

               



        
        if (  $_SESSION['is_admin'] & YetkiKontrol::CREAD) {
        echo '<a href="kat_list.php">
                <span class="material-icons-sharp">
                    view_list
                </span>
                <h3>Kategoriler</h3>
                </a>';
            }

             if (  $_SESSION['is_admin'] & YetkiKontrol::UREAD) {
        echo '<a href="urun_list.php">
                <span class="material-icons-sharp">
                shopping_basket
                </span>
                <h3>Ürünler</h3>
                </a>';
            }      



        ?>


        <a href="./inc/logout.php">
            <span class="material-icons-sharp">
                logout
            </span>
            <h3>Logout</h3>
        </a>
    </div>
</aside>