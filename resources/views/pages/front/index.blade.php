@extends('layouts.front')

@section('contenu_accueil')


<main class="main">
  
    
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <!--logo-->
    <img src="{{asset('img/world-dotted-map.png')}}" alt="" class="hero-bg" data-aos="fade-in">

    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">{{$siteSlogan1}}</h2>
          <p data-aos="fade-up" data-aos-delay="100">{{$siteDescription}}</p>

          @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
          @endif

          @if(session()->has('error'))
                  <div class="alert alert-danger">
                      {{session()->get('error')}}
                  </div>
          @elseif(session()->has('success'))
                  <div  class="alert alert-success">
                      {{session()->get('success')}}
                  </div>
          @endif

          <form action="{{route('verifyusereligibility')}}" method="POST" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            @csrf
            <input type="text" name="position" class="form-control" placeholder="Entrez une ville ou adresse et verifiez votre eligibilité">
            <button type="submit" class="btn btn-primary">Rechercher</button>
          </form>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="1350" data-purecounter-duration="0" class="purecounter">1350</span>
                <p>Clients</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="1521" data-purecounter-duration="0" class="purecounter">1521</span>
                <p>Démenagements</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="53" data-purecounter-duration="0" class="purecounter">53</span>
                <p>Chauffeurs</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="0" class="purecounter">+10</span>
                <p>Services </p>
              </div>
            </div><!-- End Stats Item -->

          </div>

        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{asset('img/hero-img1.svg')}}" class="img-fluid mb-3 mb-lg-0  " alt="">
        </div>

      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- Featured Services Section -->
  <section id="featured-services" class="featured-services section">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
          <div>
            <h4 class="title">Chargement precis</h4>
            <p class="description">Chez {{$siteName}} , le processus commence par un chargement précis de vos biens. Notre équipe s'assure que chaque objet est soigneusement chargé dans le camion, en utilisant des techniques adaptées pour protéger vos biens. Nous prenons le temps de bien organiser le chargement afin d'éviter tout dommage pendant le transport. Grâce à notre attention aux détails, vous pouvez être sûr que vos affaires sont entre de bonnes mains dès le départ.</p>
            <a href="#" class="readmore stretched-link"><span>Lire Plus</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
          <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
          <div>
            <h4 class="title">Transport fiable</h4>
            <p class="description">Une fois vos biens chargés, nous passons à la phase de transport. Nos chauffeurs expérimentés prennent en charge la conduite, garantissant un trajet rapide et fiable vers votre nouvelle destination. Nous utilisons une flotte de camions modernes, équipés pour assurer la sécurité de vos objets pendant le voyage. De plus, nous suivons chaque déménagement en temps réel, vous offrant ainsi une tranquillité d'esprit tout au long du processus.</p>
            <a href="#" class="readmore stretched-link"><span>Lire Plus</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
          <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
          <div>
            <h4 class="title">Déchargement satisfaisant</h4>
            <p class="description">À l'arrivée, notre équipe se charge du déchargement avec le même soin que lors du chargement. Nous veillons à ce que chaque bien soit déchargé avec précaution là où vous le souhaitez dans votre nouveau domicile. Votre satisfaction est notre priorité, et nous nous assurons que tout est en ordre avant de quitter les lieux. Grâce à notre service attentionné, vous pouvez commencer votre nouvelle vie sans stress ni tracas.</p>
            <a href="#" class="readmore stretched-link"><span>Lire plus</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>

  </section><!-- /Featured Services Section -->

  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
          <img src="{{asset('img/about.jpg')}}" class="img-fluid" alt="">
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
        </div>

        <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
          <h3>A propos de nous</h3>
          <p>
            Chez {{$siteName}}, nous sommes spécialisés dans le déménagement de biens de toutes tailles, offrant un service fiable et sans stress pour garantir la satisfaction de nos clients à chaque étape.
          </p>
          <ul>
            <li>
              <i class="bi bi-diagram-3"></i>
              <div>
                <h5>Notre Mission</h5>
                <p>Nous nous engageons à offrir un service de déménagement exceptionnel, en garantissant la sécurité et la satisfaction de nos clients à chaque étape.</p>
              </div>
            </li>
            <li>
              <i class="bi bi-fullscreen-exit"></i>
              <div>
                <h5>Notre équipe</h5>
                <p>Notre équipe expérimentée et professionnelle est dédiée à rendre votre déménagement facile et sans stress, en prenant soin de vos biens précieux.</p>
              </div>
            </li>
            <li>
              <i class="bi bi-broadcast"></i>
              <div>
                <h5>Nos valeurs</h5>
                <p>Nous valorisons l'intégrité, la transparence et le respect, assurant un service fiable et de qualité pour tous vos besoins en déménagement.</p>
              </div>
            </li>
          </ul>
        </div>

      </div>

    </div>

  </section><!-- /About Section -->

  <!-- Services Section -->
  <section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span>Nos Services<br></span>
      <h2>Nos Services</h2>
      <p>Des solutions de déménagement adaptées à tous vos besoins.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('img/service-1.jpg')}}" alt="" class="img-fluid">
            </div>
            <h3>Emmenagement</h3>
            <p>Nous facilitons votre emménagement en assurant un transport sécurisé de vos biens et en les plaçant soigneusement dans votre nouveau domicile.</p>
            @auth
            <div class="badge badge-info w-65 mb-2">Commander</div>
            @endauth
            @guest
            <div class="badge badge-warning w-65 mb-2">Plus d'infos</div>
            @endguest
          </div>
          
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('img/service-2.jpg')}}" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Entretien nettoyage</a></h3>
            <p>Notre service d'entretien nettoyage garantit un espace propre et accueillant, vous permettant de profiter pleinement de votre nouvel environnement sans tracas.</p>
            @auth
            <div class="badge badge-info w-65 mb-2">Commander</div>
            @endauth
            @guest
            <div class="badge badge-warning w-65 mb-2">Plus d'infos</div>
            @endguest
            </div>
          
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('img/service-3.jpg')}}" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Electricité</a></h3>
            <p>Nos électriciens qualifiés s'occupent de toutes vos installations électriques, garantissant sécurité et efficacité pour un fonctionnement optimal de votre domicile.</p>
            @auth
            <div class="badge badge-info w-65 mb-2">Commander</div>
            @endauth
            @guest
            <div class="badge badge-warning w-65 mb-2">Plus d'infos</div>
            @endguest
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('img/service-4.jpg')}}" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Plomberie</a></h3>
            <p>Nous offrons des services de plomberie fiables, allant des réparations aux installations, pour assurer le bon fonctionnement de vos systèmes d'eau.</p>
            @auth
            <div class="badge badge-info w-65 mb-2">Commander</div>
            @endauth
            @guest
            <div class="badge badge-warning w-65 mb-2">Plus d'infos</div>
            @endguest
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('img/service-5.jpg')}}" alt="" class="img-fluid">
            </div>
            <h3>Jardinage</h3>
            <p>Nos experts en jardinage créent et entretiennent des espaces extérieurs magnifiques, vous permettant de profiter d'un environnement verdoyant et agréable chez vous.</p>
            @auth
            <div class="badge badge-info w-65 mb-2">Commander</div>
            @endauth
            @guest
            <div class="badge badge-warning w-65 mb-2">Plus d'infos</div>
            @endguest
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="card">
            <div class="card-img">
              <img src="{{asset('img/service-6.jpg')}}" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Cuisine</a></h3>
            <p>Nous offrons un service de préparation de repas sur mesure, où nos chefs préparent des plats savoureux et équilibrés selon vos goûts et préférences. Que ce soit pour un dîner en famille ou des repas hebdomadaires, nous nous occupons de tout, des courses à la cuisson.</p>
            @auth
            <div class="badge badge-info w-65 mb-2">Commander</div>
            @endauth
            @guest
            <div class="badge badge-warning w-65 mb-2">Plus d'infos</div>
            @endguest
          </div>
        </div><!-- End Card Item -->

      </div>

    </div>

  </section><!-- /Services Section -->

  <!-- Call To Action Section -->
  <section id="call-to-action" class="call-to-action section dark-background">

    <img src="{{asset('img/cta-bg.jpg')}}" alt="">

    <div class="container">
      <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-xl-10">
          <div class="text-center">
            <h3>Devis</h3>
            <p>Contactez-nous dès aujourd'hui pour bénéficier de notre expertise en déménagement. Notre équipe est prête à vous accompagner à chaque étape, garantissant un service rapide, fiable et sans stress pour tous vos besoins.</p>
            <a class="cta-btn" href="{{route('signupview')}}">Demandez un devis gratuit
            </a>
          </div>
        </div>
      </div>
    </div>

  </section><!-- /Call To Action Section -->

  <!-- Features Section -->
  <section id="features" class="features section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span>Fonctionnalités</span>
      <h2>Fonctionnalités</h2>
      <p>Découvrez les avantages uniques de nos services de déménagement.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
          <img src="{{asset('img/features-1.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          <h3>Service client personnalisé</h3>
          <p class="fst-italic">
            Nous offrons un service client attentif, répondant à toutes vos questions et besoins spécifiques, garantissant une expérience de déménagement sans stress.
          </p>
          <ul>
            <li><i class="bi bi-check"></i><span> Disponible 24h/24 et 6jr/7</span></li>
            <li><i class="bi bi-check"></i> <span>Service client réactif</span></li>
            <li><i class="bi bi-check"></i> <span>nous personnalisons vos demandes en fonction de vos besoins</span></li>
          </ul>
          @auth
          <div class="badge badge-warning">Nous contacter</div>
          @endauth
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('img/features-2.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
          <h3>Equipe professionnelle</h3>
          <p class="fst-italic">
            Notre équipe est composée de professionnels expérimentés, formés pour gérer chaque aspect du déménagement avec soin et efficacité, assurant la sécurité de vos biens.
          </p>
          <p>
            Notre équipe s'engage à offrir un service de qualité, en respectant les délais et en répondant à 
            vos besoins spécifiques. Votre satisfaction est notre priorité, et nous mettons tout en œuvre 
            pour y parvenir.
          </p>
          @auth
          <div class="badge badge-info">Plus d'infos</div>
          @endauth
        </div>
       
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
          <img src="{{asset('img/features-3.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7" data-aos="fade-up">
          <h3> Flexibilité des services</h3>
          <p>Nous proposons des services flexibles adaptés à vos besoins spécifiques, que ce soit pour un déménagement local ou à distance, afin de répondre à toutes vos attentes.</p>
          <ul>
            <li><i class="bi bi-check"></i> <span>Déménagements locaux et longue distance selon vos besoins.</span></li>
            <li><i class="bi bi-check"></i><span> Options personnalisées pour s'adapter à votre emploi du temps.</span></li>
            <li><i class="bi bi-check"></i> <span>Services disponibles pour les particuliers et les entreprises.</span>.</li>
          </ul>
          @auth
          <div class="badge badge-success">contacter</div>
          @endauth
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
          <img src="{{asset('img/features-4.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
          <h3>Tarifs compétitifs</h3>
          <p class="fst-italic">
            Nous proposons des tarifs compétitifs sans compromis sur la qualité de service, vous offrant ainsi le meilleur rapport qualité-prix pour votre déménagement.
          </p>
          <p>
            Nous nous efforçons de dépasser vos attentes à chaque étape du déménagement. Notre approche
             centrée sur le client garantit une expérience sans stress, où chaque détail est soigneusement
              pris en compte pour votre satisfaction.
          </p>
          @auth
          <div class="badge badge-warning">commander</div>
          @endauth
        </div>
      </div><!-- Features Item -->

    </div>

  </section><!-- /Features Section -->

 
  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section dark-background">

    <img src="{{asset('img/temoignages-bg.jpg')}}" class="testimonials-bg" alt="">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            }
          }
        </script>
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
              <h3>Justin A</h3>
              <h4>Ceo &amp; Fondateur</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>
                  Je suis ravi de mon expérience avec {{$siteName}}. L'équipe a été professionnelle, rapide et a pris soin de mes biens. Je recommande vivement leurs services à tous ceux qui déménagent !
                </span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
              <h3>Sarah A</h3>
              <h4>Graphiste</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>
                  Un service exceptionnel ! L'équipe a fait preuve d'une grande efficacité et d'un excellent savoir-faire. Ils ont rendu mon déménagement sans stress. Je les choisirai à nouveau sans hésiter.
                </span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
              <h3>Emilie D</h3>
              <h4>Couturiere</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>
                  Merci à {{$siteName}} pour leur aide précieuse lors de mon déménagement. Chaque membre de l'équipe était sympathique et professionnel, rendant le processus fluide et agréable. Je suis très satisfait du résultat.
                </span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
              <h3>Debora K.</h3>
              <h4>Comptable</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span>
                  Un déménagement parfait ! L'équipe a respecté les délais et a géré chaque détail avec soin. Mes biens sont arrivés en excellent état. Je recommande chaudement leurs services à tous.
                </span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="{{asset('img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
              <h3>Jeane E.</h3>
              <h4>Commerçante</h4>
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                <span> 
                  Je ne peux que remercier {{$siteName}} pour leur incroyable service. Leur équipe est compétente, attentive et a su répondre à toutes mes attentes. Un déménagement réussi, je les recommande sans réserve !
                </span>
                <i class="bi bi-quote quote-icon-right"></i>
              </p>
            </div>
          </div><!-- End testimonial item -->

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- /Testimonials Section -->

  <!-- Faq Section -->
  <section id="faq" class="faq section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span>Questions fréquemments Posées</span>
      <h2>Questions fréquemments Posées</h2>
      <p>Réponses à vos interrogations courantes sur nos services</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-10">

          <div class="faq-container">

            <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
              <i class="faq-icon bi bi-question-circle"></i>
              <h3>Quels types de déménagements proposez-vous ?</h3>
              <div class="faq-content">
                <p>Nous proposons des déménagements locaux et longue distance, adaptés à vos besoins spécifiques, que ce soit pour des particuliers ou des entreprises.</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
              <i class="faq-icon bi bi-question-circle"></i>
              <h3>Comment puis-je obtenir un devis?</h3>
              <div class="faq-content">
                <p>Vous pouvez demander un devis en vous inscrivant comme un client sur la plateforme puis en soumettant un ordre de demenagement. Vous pouvez egalement nous contacter directement par téléphone ou par email pour plus d'aide et assistance. Nous vous répondrons rapidement.</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
              <i class="faq-icon bi bi-question-circle"></i>
              <h3>Offrez-vous des services d'emballage ?</h3>
              <div class="faq-content">
                <p>Bien que nous ne fournissions pas de matériel d'emballage(pour le moment), notre équipe peut vous conseiller sur les meilleures pratiques et techniques pour protéger vos biens pendant le déménagement.</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
              <i class="faq-icon bi bi-question-circle"></i>
              <h3>Quelles sont vos méthodes de paiement?</h3>
              <div class="faq-content">
                <p>Pour le moment nous limitons nos moyens de paiement a mtn mobile money envisageons dans un futur proche d'en rajouter d'autres(moov money, celtis, etc).</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
              <i class="faq-icon bi bi-question-circle"></i>
              <h3>J'ai besoin d'un service connexe. Que faire?</h3>
              <div class="faq-content">
                <p>Si vous ressentez le besoin d'un service connexe ou supplémentaire dans le cadre de votre démenagement(exemple: emménagement, electricité, nettoyage, plomberie etc), ecrivez nous ou contactez nous par email 
                  et nous vous mettrons en contact avec un de nos agents spécialisés. NB: il est à noter que les frais liés aux services connexes ne sont
                pas dans le montant du démengement affiché sur votre devis. les services connexes sont payés 
              en main propre au prestataire ou agent specilisé après service rendu. le client doit s'assurer de remplir le devis que 
            l'agent specilisé lui aura fourni contenant bien les infos et le logo de l'entreprise </p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
              <i class="faq-icon bi bi-question-circle"></i>
              <h3>Comment se passe le paiement d'un demenagement?</h3>
              <div class="faq-content">
                <p>Une fois votre démenagement soumis, vous avez la possibilité de telecharger le devis lié depuis votre interface.
                  sur ce dernier, vous avez le montant total de votre demenagement. Mais vous ne payez que
                  lorsque le déménagement a été effective et que vous arrivez à destination.
                A l'arrivée, le chauffeur depuis son interface vous fera payer le trajet en soumettant un ordre de paiement.
                Il devra spécifié pour cela le montant du trajet, et le numero mobile money du client.
                Un code de confirmation(comme cela se fait d'habitude ) vous sera envoyé. Communiquez le au chauffeur pour valider la transaction.  
                </p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <!-- End Faq item-->

          </div>

        </div>

      </div>

    </div>

  </section><!-- /Faq Section -->

</main>


@endsection()


  