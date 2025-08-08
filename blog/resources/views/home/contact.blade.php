@extends('layouts.homelayout')
@section('main')
    <section class="contact spad">
        <div class="container">
            <div class="contact__text">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d105196.30230376216!2d84.03425979008588!3d28.25821598085883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1746709600782!5m2!1sen!2snp" width="350" height="350" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="contact__widget">
                            <ul>
                                <!-- <li>
                                    <i class="fa fa-map-marker"></i>
                                    <span>John Doe, 123 Main St Chicago, IL 60626</span>
                                </li> -->
                                <li>
                                    <i class="fa fa-mobile"></i>
                                    <span>Phone: {{ $website->contact }}</span>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>Email: {{ $website->email }} </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact__form">
                            <div class="contact__form__title">
                                <h2>GET IN TOUCH</h2>
                                <p>Please enter your contact details and a short message below and I will try to answer your query as soon as possible.</p>
                            </div>
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                                <input type="text" name="contact" value="{{ old('contact') }}" placeholder="Phone">
                                <textarea name="message" placeholder="Message">{{ old('message') }}</textarea>
                                <button type="submit" class="site-btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection