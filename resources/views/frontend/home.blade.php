@extends('frontend.layouts.app')

@section('title',  ucfirst(app_name()) . ' | ' . __('navs.general.home'))

@section('content')
{!! $content !!}
@endsection

@push('after-scripts')
<script>
$(function () {
    var $days = $('.Homepage-countdown-number.-d');
    var $hours = $('.Homepage-countdown-number.-h');
    var $minutes = $('.Homepage-countdown-number.-m');
    var $seconds = $('.Homepage-countdown-number.-s');

    var endDate = new Date('2020-08-01')

    setInterval(() => {
        updateTimeRemaining()
    }, 1000);

    function updateTimeRemaining(){
        var t = endDate - new Date();

        var seconds = Math.floor( (t/1000) % 60 );
        $seconds.text(addLeadingZero(seconds));

        var minutes = Math.floor( (t/1000/60) % 60 );
        $minutes.text(addLeadingZero(minutes));

        var hours = Math.floor( (t/(1000*60*60)) % 24 );
        $hours.text(addLeadingZero(hours));

        var days = Math.floor( t/(1000*60*60*24) );
        $days.text(addLeadingZero(days));
    }

    function addLeadingZero(text) {
        if ((''+text).length < 2) {
            return '0' + text;
        }
        return text;
    }
});
</script>
@endpush