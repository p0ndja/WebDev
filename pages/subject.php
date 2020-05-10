<?php require '../global/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../global/head.php'; ?>
    <style>
    @media (min-width: 960px)
        {
        .card-columns {
            -webkit-column-count: 25;
            -moz-column-count: 5;
            column-count: 5;
        }
    }

    @media (max-width: 960px)
        {
        .card-columns {
            -webkit-column-count: 2;
            -moz-column-count: 2;
            column-count: 2;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-normal fixed-top scrolling-navbar" id="nav"
        role="navigation">
        <?php require '../global/navbar.php'; ?>
    </nav>
    <div class="container-fluid" id="container" style="padding-top: 88px">
        <div class="card-columns">
            <div class="card mb-3 mx-auto">
                <a href="#maths">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Maths.jpg" class="img-fluid" alt="Maths" align="center">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#sci">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Science.jpg" class="img-fluid" alt="Science">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#foreign">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Foreign_Language.jpg" class="img-fluid"
                            alt="Foreign Language">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#thai">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Thai.jpg" class="img-fluid" alt="Thai">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#social">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Social.jpg" class="img-fluid" alt="Social">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#pe">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/PE.jpg" class="img-fluid" alt="PE">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#tech">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Technology.jpg" class="img-fluid" alt="Technology">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#art">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Art.jpg" class="img-fluid" alt="Art">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#choose">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Chosen.jpg" class="img-fluid" alt="Up-to-Student">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
            <div class="card mb-3 mx-auto">
                <a href="#club">
                    <div class="view overlay zoom">
                        <img src="../static/images/subject/Club.jpg" class="img-fluid" alt="Club">
                        <div class="mask flex-center rgba-black-slight">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <hr>        
    </div>
    <div class="container">
        <div id="maths">
        <div style="padding-top: 88px;"></div>
            <h3>Math</h3>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis rhoncus efficitur. Praesent eget tellus sodales, luctus odio eget, sagittis arcu. Duis iaculis ante sed nisl suscipit, et vestibulum ipsum tempor. Proin ac dolor enim. Nullam eget ipsum a nisi pharetra commodo id quis lorem. Mauris a mauris ac nisl fringilla tempus ac quis quam. Pellentesque lectus est, vehicula nec elit in, rutrum porta mi. Aenean eget rutrum purus, id suscipit nunc. Nam sodales lacus convallis porttitor porttitor. Curabitur ultricies leo quis lacus placerat, non lobortis leo blandit. Nulla convallis ipsum eget enim sollicitudin, vel euismod purus semper.

Aliquam dignissim suscipit tincidunt. Donec sagittis mi eu mollis aliquet. Donec faucibus posuere dolor non porta. Vestibulum rhoncus at dolor in sollicitudin. Quisque suscipit libero eros, a dignissim tellus euismod congue. Donec nisl metus, viverra sagittis erat nec, varius imperdiet nunc. Suspendisse auctor diam ut magna fringilla consequat.

Morbi tortor est, suscipit a posuere quis, imperdiet sed urna. Praesent massa mi, maximus eu accumsan eu, pellentesque et velit. Nunc aliquet faucibus purus id consectetur. Suspendisse interdum molestie condimentum. Sed in lorem erat. Proin cursus massa eu luctus ultricies. Suspendisse vitae risus a ligula condimentum ultricies.

Donec congue facilisis justo at feugiat. Sed elementum est a eros placerat, at ullamcorper massa malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam cursus enim eu tellus porta aliquam. Nulla sit amet nulla sed ex mollis malesuada at id nibh. Suspendisse eget nisi nunc. Mauris luctus, massa et blandit euismod, ipsum mi rhoncus mi, dictum porttitor odio tellus a diam. Ut euismod iaculis erat, nec rutrum quam semper non. Vestibulum ultricies mi vehicula pulvinar hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla facilisi. Vestibulum vitae justo eu turpis molestie malesuada. Integer sagittis nec mi ut porta.

Nullam maximus ipsum sed massa tincidunt, vel tincidunt eros mattis. Vivamus placerat mi eget maximus commodo. Fusce porttitor nibh nec felis ultrices porttitor. In convallis lacinia lacus, ut congue nibh eleifend id. Ut mollis porta diam pellentesque tempor. Cras rhoncus rutrum luctus. Cras enim dui, dignissim ut ultrices eu, egestas a turpis. Sed mollis lacus diam, ac suscipit mauris imperdiet quis. Quisque urna enim, tincidunt eget diam eget, tempor accumsan nibh. Sed suscipit venenatis pharetra. Sed pharetra viverra elit vel pellentesque. Donec fermentum faucibus fermentum.
            </p>
        </div>
        <div id="sci">
        <div style="padding-top: 88px;"></div>
            <h3>Science</h3>
            <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis rhoncus efficitur. Praesent eget tellus sodales, luctus odio eget, sagittis arcu. Duis iaculis ante sed nisl suscipit, et vestibulum ipsum tempor. Proin ac dolor enim. Nullam eget ipsum a nisi pharetra commodo id quis lorem. Mauris a mauris ac nisl fringilla tempus ac quis quam. Pellentesque lectus est, vehicula nec elit in, rutrum porta mi. Aenean eget rutrum purus, id suscipit nunc. Nam sodales lacus convallis porttitor porttitor. Curabitur ultricies leo quis lacus placerat, non lobortis leo blandit. Nulla convallis ipsum eget enim sollicitudin, vel euismod purus semper.

Aliquam dignissim suscipit tincidunt. Donec sagittis mi eu mollis aliquet. Donec faucibus posuere dolor non porta. Vestibulum rhoncus at dolor in sollicitudin. Quisque suscipit libero eros, a dignissim tellus euismod congue. Donec nisl metus, viverra sagittis erat nec, varius imperdiet nunc. Suspendisse auctor diam ut magna fringilla consequat.

Morbi tortor est, suscipit a posuere quis, imperdiet sed urna. Praesent massa mi, maximus eu accumsan eu, pellentesque et velit. Nunc aliquet faucibus purus id consectetur. Suspendisse interdum molestie condimentum. Sed in lorem erat. Proin cursus massa eu luctus ultricies. Suspendisse vitae risus a ligula condimentum ultricies.

Donec congue facilisis justo at feugiat. Sed elementum est a eros placerat, at ullamcorper massa malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam cursus enim eu tellus porta aliquam. Nulla sit amet nulla sed ex mollis malesuada at id nibh. Suspendisse eget nisi nunc. Mauris luctus, massa et blandit euismod, ipsum mi rhoncus mi, dictum porttitor odio tellus a diam. Ut euismod iaculis erat, nec rutrum quam semper non. Vestibulum ultricies mi vehicula pulvinar hendrerit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla facilisi. Vestibulum vitae justo eu turpis molestie malesuada. Integer sagittis nec mi ut porta.

Nullam maximus ipsum sed massa tincidunt, vel tincidunt eros mattis. Vivamus placerat mi eget maximus commodo. Fusce porttitor nibh nec felis ultrices porttitor. In convallis lacinia lacus, ut congue nibh eleifend id. Ut mollis porta diam pellentesque tempor. Cras rhoncus rutrum luctus. Cras enim dui, dignissim ut ultrices eu, egestas a turpis. Sed mollis lacus diam, ac suscipit mauris imperdiet quis. Quisque urna enim, tincidunt eget diam eget, tempor accumsan nibh. Sed suscipit venenatis pharetra. Sed pharetra viverra elit vel pellentesque. Donec fermentum faucibus fermentum.
            </p>
        </div>
    </div>
    
<?php require '../global/popup.php'; ?>
<?php require '../global/footer.php'; ?>
</body>

</html>