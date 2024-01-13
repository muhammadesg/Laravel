@section('js')
<script>
    // Name
    $('#name_uz').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue === '') {
            $('#name_en').val('');
            $('#name_ru').val('');
        } else {
            translateText('name_uz', 'name_en', 'uz', 'en');
            translateText('name_uz', 'name_ru', 'uz', 'ru');
        }
    });

    // $('#name_ru').on('input', function() {
    //     var inputValue = $(this).val();
    //     if (inputValue === '') {
    //         $('#name_en').val('');
    //         $('#name_uz').val('');
    //     } else {
    //         translateText('name_ru', 'name_en', 'ru', 'en');
    //         translateText('name_ru', 'name_uz', 'ru', 'uz');
    //     }
    // });

    // $('#name_en').on('input', function() {
    //     var inputValue = $(this).val();
    //     if (inputValue === '') {
    //         $('#name_ru').val('');
    //         $('#name_uz').val('');
    //     } else {
    //         translateText('name_en', 'name_ru', 'en', 'ru');
    //         translateText('name_en', 'name_uz', 'en', 'uz');
    //     }
    // });

    // Address
    $('#address_uz').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue === '') {
            $('#address_en').val('');
            $('#address_ru').val('');
        } else {
            translateText('address_uz', 'address_en', 'uz', 'en');
            translateText('address_uz', 'address_ru', 'uz', 'ru');
        }
    });

    // $('#address_ru').on('input', function() {
    //     var inputValue = $(this).val();
    //     if (inputValue === '') {
    //         $('#address_en').val('');
    //         $('#address_uz').val('');
    //     } else {
    //         translateText('address_ru', 'address_en', 'ru', 'en');
    //         translateText('address_ru', 'address_uz', 'ru', 'uz');
    //     }
    // });

    // $('#address_en').on('input', function() {
    //     var inputValue = $(this).val();
    //     if (inputValue === '') {
    //         $('#address_ru').val('');
    //         $('#address_uz').val('');
    //     } else {
    //         translateText('address_en', 'address_ru', 'en', 'ru');
    //         translateText('address_en', 'address_uz', 'en', 'uz');
    //     }
    // });

    // Location
    $('#location_uz').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue === '') {
            $('#location_en').val('');
            $('#location_ru').val('');
        } else {
            translateText('location_uz', 'location_en', 'uz', 'en');
            translateText('location_uz', 'location_ru', 'uz', 'ru');
        }
    });

    // $('#location_ru').on('input', function() {
    //     var inputValue = $(this).val();
    //     if (inputValue === '') {
    //         $('#location_en').val('');
    //         $('#location_uz').val('');
    //     } else {
    //         translateText('location_ru', 'location_en', 'ru', 'en');
    //         translateText('location_ru', 'location_uz', 'ru', 'uz');
    //     }
    // });

    // $('#location_en').on('input', function() {
    //     var inputValue = $(this).val();
    //     if (inputValue === '') {
    //         $('#location_ru').val('');
    //         $('#location_uz').val('');
    //     } else {
    //         translateText('location_en', 'location_ru', 'en', 'ru');
    //         translateText('location_en', 'location_uz', 'en', 'uz');
    //     }
    // });

    // Text
    $('#text_uz').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue === '') {
            $('#text_en').val('');
            $('#text_ru').val('');
        } else {
            translateText('text_uz', 'text_en', 'uz', 'en');
            translateText('text_uz', 'text_ru', 'uz', 'ru');
        }
    });

    // Title
    $('#title_uz').on('input', function() {
        var inputValue = $(this).val();
        if (inputValue === '') {
            $('#title_en').val('');
            $('#title_ru').val('');
        } else {
            translateText('title_uz', 'title_en', 'uz', 'en');
            translateText('title_uz', 'title_ru', 'uz', 'ru');
        }
    });
</script>
@endsection
