@php
    use App\Models\Option;
@endphp

<section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div
                class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1"
            >
                @foreach (Option::heroSliders()->value as $heroSlider)
                    <div
                        class="single-hero-slider single-animation-wrap"
                        style="
                            background-image: url({{ $heroSlider['image'] }});
                        "
                    >
                        <div class="slider-content">
                            <h1 class="display-2 mb-40">
                                {{ $heroSlider['heading1'] }}
                                <br />
                                {{ $heroSlider['heading2'] }}
                            </h1>
                            <p class="mb-65">
                                {{ $heroSlider['subheading'] }}
                            </p>
                            <form class="form-subcriber d-flex">
                                <input
                                    type="email"
                                    placeholder="Your emaill address"
                                />
                                <button class="btn" type="submit">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
