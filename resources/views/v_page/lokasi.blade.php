@extends('v_layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="billing-details">
                <p> {{ $judul }} </p>
                <div class="section-title">
                    <h3 class="title">{{ $subJudul }} </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1075.22381869302!2d109.18708246958725!3d-6.945842299565883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb8aa9edd5e97%3A0x25556503c70300d!2sKarang%20Cegak%2C%20Karangjati%2C%20Kec.%20Tarub%2C%20Kabupaten%20Tegal%2C%20Jawa%20Tengah%2052184!5e1!3m2!1sid!2sid!4v1744845435803!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
