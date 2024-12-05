<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="CSS/producto.css">


    <title>Productos</title>
</head>
<body>

    <div class="menu container">
        <img class="logo-1" src="images/logo.svg" alt="" >
        <input type="checkbox" id="menu">
        <label for="menu"> 
        <img src="images/menu.png" class="menu-icono" alt="">
        </label>
        <nav class="navbar">
         <div class="menu-1">
            <ul>
                <li><a href="https://localhost/PHP-registro/inicio.php">Inicio</a></li>
            </ul>  
         </div>
         <img class="logo-2" src="images/logo.svg" alt="">     
         <div class="menu-2">
           
            <div class="socials">
                <a href="#">
                    <div class="social">
                        <img src="images/s1.svg" alt="">
                    </div>
                </a>
                <a href="#">
                    <div class="social">
                        <img src="images/s2.svg" alt="">
                    </div>
                </a>
                <a href="#">
                    <div class="social">
                        <img src="images/s3.svg" alt="">
                    </div>
                </a>
    
            </div>
         </div>


         <div class="carro">
            <ul>
                <li class="submenu">
                    <div class="carrito-container">
                        <span id="carrito-count" class="carrito-count">0</span>
                        <img src="images/carrito2-removebg-preview.png" id="img-carrito" alt="carrito">
                       
                    </div>
                    <div id="carrito">
                        <table id="lista-carrito">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <a href="#" id="vaciar-carrito" class="btn-2">Vaciar carrito</a>
                        <a href="Finalizar-compra.php" id="comprar-carrito" class="btn-2">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>
    </div>
    
  

   
      <div class="carousel-wrapper">
        <div class="titulo">
          <h1>Productos</h1>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.<br> Numquam mollitia alias exercitationem sunt.</p>
        </div>
          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="https://rosenheimsbeste.de/content/uploads/2018/08/Fotolia_214788386_S-600x400.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                      <img src="https://gourmetdemexico.com.mx/wp-content/uploads/2015/08/alimentos-adictivos-papas-fritas.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                      <img src="https://img.pystatic.com/products/415f0baf-927c-49de-bfcd-e1c3593fe61d.jpg" class="d-block w-100" alt="...">
                  </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
          </div>
      </div>
      <main class="product">

        <div class="tabs container">
           
            <input type="radio" name="tabs" id="tab1" checked="checked" class="tabInput" value="1">
            <label for="tab1">Hamburguesa</label>
            
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper1">
                    <div class="swiper-swrapper">
                    
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <img src="images/food1.png" alt="">           
                                </div>
                                <div class="product-txt">
                                    <h4>haburguesa</h4>
                                    <p>Calidad premium</p>
                                    <span class="price">$80.00</span>
                                </div>
                                <div class="product-btn">
                                    <button class="btn">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-slide">
                          <div class="product">
                              <div class="product-img">
                                  <img src="images/food1.png" alt="">           
                              </div>
                              <div class="product-txt">
                                  <h4>Producto</h4>
                                  <p>Calidad premium</p>
                                  <span class="price">$80.00</span>
                              </div>
                              <div class="product-btn">
                                  <button class="btn">Agregar al carrito</button>
                              </div>
                          </div>
                      </div>
  

                      <div class="swiper-slide">
                        <div class="product">
                            <div class="product-img">
                                <img src="images/food1.png" alt="">           
                            </div>
                            <div class="product-txt">
                                <h4>Producto</h4>
                                <p>Calidad premium</p>
                                <span class="price">$80.00</span>
                            </div>
                            <div class="product-btn">
                                <button class="btn">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>

    s
    
                    </div>
    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                </div>
            </div>
    
            <input type="radio" name="tabs" id="tab2" checked="checked" class="tabInput" value="2">
            <label for="tab2">Panchos</label>
            <div class="tab">
                <div class="swiper mySwiper-2" id="swiper2">
                    <div class="swiper-swrapper">
    
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <img src="images/food4.png" alt="">           
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Calidad premium</p>
                                    <span class="price">$80.00</span>
                                </div>
                                <div class="product-btn">
                                    <button class="btn">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>
                        

                        <div class="swiper-slide">
                          <div class="product">
                              <div class="product-img">
                                  <img src="images/food4.png" alt="">           
                              </div>
                              <div class="product-txt">
                                  <h4>Producto</h4>
                                  <p>Calidad premium</p>
                                  <span class="price">$80.00</span>
                              </div>
                              <div class="product-btn">
                                  <button class="btn">Agregar al carrito</button>
                              </div>
                          </div>
                      </div>


                      <div class="swiper-slide">
                        <div class="product">
                            <div class="product-img">
                                <img src="images/food4.png" alt="">           
                            </div>
                            <div class="product-txt">
                                <h4>Producto</h4>
                                <p>Calidad premium</p>
                                <span class="price">$80.00</span>
                            </div>
                            <div class="product-btn">
                                <button class="btn">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>

  

                        

    
                    </div>
    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                </div>
            </div>
    
            <input type="radio" name="tabs" id="tab3" checked="checked" class="tabInput" value="3">
            <label for="tab3">Papas</label>
            <div class="tab"> 
                <div class="swiper mySwiper-2" id="swiper3">
                    <div class="swiper-swrapper">
    
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-img">
                                    <img src="images/food7.png" alt="">           
                                </div>
                                <div class="product-txt">
                                    <h4>Producto</h4>
                                    <p>Calidad premium</p>
                                    <span class="price">$80.00</span>
                                </div>
                                <div class="product-btn">
                                    <button class="btn">Agregar al carrito</button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                          <div class="product">
                              <div class="product-img">
                                  <img src="images/food7.png" alt="">           
                              </div>
                              <div class="product-txt">
                                  <h4>Producto</h4>
                                  <p>Calidad premium</p>
                                  <span class="price">$80.00</span>
                              </div>
                              <div class="product-btn">
                                  <button class="btn">Agregar al carrito</button>
                              </div>
                          </div>
                      </div>
  

                      <div class="swiper-slide">
                        <div class="product">
                            <div class="product-img">
                                <img src="images/food7.png" alt="">           
                            </div>
                            <div class="product-txt">
                                <h4>Producto</h4>
                                <p>Calidad premium</p>
                                <span class="price">$80.00</span>
                            </div>
                            <div class="product-btn">
                                <button class="btn">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>

    
    
                    </div>
    
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
    
                </div>
            </div>
    
        </div>
    </main>
    
    
    

    <script src="JS/producto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>