@extends('Restaurant.layouts.app')
@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="{{ asset('Restaurant/assets/img/about.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                            aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat
                            nulla pariatur.
                        </li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Why Us</h2>
                <p>Why Choose Our Restaurant</p>
            </div>

            <div class="row">
                @foreach($chooses as $choose)
                    <x-choose-box :choose="$choose"/>
                @endforeach
            </div>

        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                    <menu-filter id="menu-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        @foreach ($tags as $tag)
                            <li data-filter=".filter-{{$tag->slug}}">{{ $tag->tag }}</li>
                        @endforeach
                    </menu-filter>
                </div>
            </div>

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                @foreach($menus as $menu)
                    <div class="col-lg-6 menu-item filter-{{$menu->tag->slug}}">
                        <img src="{{ asset('/images/menu/'.$menu->image) }}" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">{{ $menu->name }}</a><span>${{ $menu->price }}</span>
                        </div>
                        <div class="menu-ingredients">
                            @foreach ($menu->categories as $category)
                                {{ $category->name }}
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Specials</h2>
                <p>Check Our Specials</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        @foreach ($specials as $special)
                            <li class="nav-item">
                                <a class="nav-link show" data-bs-toggle="tab" href="#{{ $special->slug }}">{{
                            $special->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        @foreach ($specials as $special)
                            <div @class(['tab-pane', 'show'=> false, 'active' => false]) id="{{ $special->slug }}">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>{{ $special->title }}</h3>
                                        <p class="fst-italic">{{ $special->description }}</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="{{ asset('/images/special/'.$special->image ) }}" alt="image food {{ $special->title }}" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Events</h2>
                <p>Organize Your Events in our Restaurant</p>
            </div>

            <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                        <div class="swiper-slide">
                            <div class="row event-item">
                                <div class="col-lg-6">
                                    <img src="{{ $event->image }}" class="img-fluid rounded" alt="{{ $event->title }}">
                                </div>
                                <div class="col-lg-6 pt-4 pt-lg-0 content">
                                    <h3>{{ $event->title }}</h3>
                                    <div class="price">
                                        <p><span>${{ $event->price }}</span></p>
                                    </div>
                                    <div>
                                        {{ $event->body }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p>Event Date : {{ $event->created_at->format('Y-M-d') }}</p>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book">
        <div class="container">

            <div class="section-title">
                <h2>Reservation</h2>
                <p>Book a Table</p>
            </div>
            {{-- start form book a table for ReservationTables --}}
            <x-form action="" method="POST">
                <div class="row">

                    <div @class(['col-lg-4', 'col-md-6' , 'form-group' ])>
                        <x-input type="text" name="name" id="name" placeholder="Enter Name" value="{{ @old('name') }}"/>
                    </div>
                    <div @class(['col-lg-4','col-md-6','form-group','mt-3','mt-md-0',])>
                        <x-input type="email" name="email" id="email" placeholder="Your Email" value="{{ @old('email') }}"
                                 class="@error('name') is-invalid @enderror"/>
                        @error('name')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' , 'mt-md-0' ])>
                        <x-input type="text" name="phone" id="phone" placeholder="Your Phone" value="{{ @old('phone') }}"
                                 class="@error('phone') is-invalid @enderror"/>
                        @error('phone')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' ])>
                        <x-input type="text" name="date" id="date" placeholder="Date" value="{{ @old('date') }}"
                                 class="@error('date') is-invalid @enderror"/>
                        @error('date')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' ])>
                        <x-input type="text" name="time" id="time" placeholder="Time" value="{{ @old('time') }}"
                                 class="@error('time') is-invalid @enderror"/>
                        @error('time')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div @class(['col-lg-4', 'col-md-6' , 'form-group' , 'mt-3' ])>
                        <x-input type="number" name="people" id="people" placeholder="# of people"
                                 value="{{ @old('people') }}" class="@error('people') is-invalid @enderror"/>
                        @error('people')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                </div>
                <div @class(['form-group', 'mt-3' ])>
                    <x-textarea name="message" placeholder="Message" class="@error('message') is-invalid @enderror">

                    </x-textarea>
                    @error('message')
                    <x-error>
                        {{ $message }}
                    </x-error>
                    @enderror
                </div>
                <div class="text-center">
                    <x-button type="submit"> Book a Table</x-button>
                </div>
            </x-form>
            {{-- end form book a table for ReservationTables --}}
        </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Testimonials</h2>
                <p>What they're saying about us</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                @foreach($contacts as $contact)
                    <!-- Start testimonial item -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>{{ $contact->user->name }}</h3>
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{ $contact->message }}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Gallery</h2>
                <p>Some photos from Our Restaurant</p>
            </div>
        </div>

        <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-0">

                @foreach ($galleries as $gallery)
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ $gallery->image }}" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ $gallery->image }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Chefs</h2>
                <p>Our Proffesional Chefs</p>
            </div>

            <div class="row">

                @foreach ($chefs as $chef)
                    <div class="col-lg-3 col-md-6">
                        <div class="member rounded" data-aos="zoom-in" data-aos-delay="100">
                            <img src="{{ $chef->image }}" class="img-fluid rounded" alt="{{ $chef->name }}">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>{{ $chef->name }}</h4>
                                    @switch($chef->position)
                                        @case(1)
                                        @php $position = "Master Chef" @endphp
                                        @break
                                        @case(2)
                                        @php $position = "Patissier" @endphp
                                        @break
                                        @case(3)
                                        @php $position = "Cook" @endphp
                                        @break
                                    @endswitch
                                    <span>{{ $position }}</span>
                                </div>
                                <div class="social">
                                    <a href="{{ $chef->twitter }}"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $chef->facebook }}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $chef->instagram }}"><i class="bi bi-instagram"></i></a>
                                    <a href="{{ $chef->linkedin }}"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>

        <div data-aos="fade-up">
            <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>

                        <div class="open-hours">
                            <i class="bi bi-clock"></i>
                            <h4>Open Hours:</h4>
                            <p>
                                Monday-Saturday:<br>
                                11:00 AM - 2300 PM
                            </p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <x-form action="{{ route('contact.store') }}" method="post">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="form-group mt-3">
                                    <x-input
                                        type="text"
                                        name="name"
                                        id="name"
                                        placeholder="Name"
                                        value=" {{ old('name') }}"
                                        class="@error('name') is-invalid @enderror"
                                    />
                                    @error('name')
                                    <x-error>
                                        {{ $message }}
                                    </x-error>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="form-group mt-3">
                                    <x-input
                                        type="email"
                                        name="email"
                                        id="email"
                                        placeholder="Email[at]Example.com"
                                        value="{{ old('email') }}"
                                        class="@error('email') is-invalid @enderror"
                                    />
                                    @error('email')
                                    <x-error>
                                        {{ $message }}
                                    </x-error>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="form-group mt-3">
                                    <x-input type="text" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}"
                                             class="@error('subject') is-invalid @enderror"/>
                                    @error('subject')
                                    <x-error>
                                        {{ $message }}
                                    </x-error>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="form-group mt-3">
                                    <x-textarea class="form-control @error('message') is-invalid @enderror" name="message" id="message" placeholder="Message" row="10">{{ old('message') }}</x-textarea>
                                    @error('message')
                                    <x-error>
                                        {{ $message }}
                                    </x-error>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mx-auto my-3">
                                <x-button type="submit">Send Message</x-button>
                            </div>
                        </div>
                    </x-form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
