(function ($) {
    'use strict'
    var sessionRatingSum = 0;
    $(document).on('click', "#sessionbtncheck1", function () {
        sessionRatingSum = 1;
        addRemoveClass2()
        $('#sessionbtncheck1').attr('checked', true)

        $('#sessionbtncheck1').addClass('active')
    });

    $(document).on('click', "#sessionbtncheck2", function () {
        sessionRatingSum = 2;
        addRemoveClass2()
        $('#sessionbtncheck1').attr('checked', true)
        $('#sessionbtncheck2').attr('checked', true)

        $('#sessionbtncheck1').addClass('active')
        $('#sessionbtncheck2').addClass('active')
    });

    $(document).on('click', "#sessionbtncheck3", function () {
        sessionRatingSum = 3;
        addRemoveClass2()
        $('#sessionbtncheck1').attr('checked', true)
        $('#sessionbtncheck2').attr('checked', true)
        $('#sessionbtncheck3').attr('checked', true)

        $('#sessionbtncheck1').addClass('active')
        $('#sessionbtncheck2').addClass('active')
        $('#sessionbtncheck3').addClass('active')
    });

    $(document).on('click', "#sessionbtncheck4", function () {
        sessionRatingSum = 4;
        addRemoveClass2()
        $('#sessionbtncheck1').attr('checked', true)
        $('#sessionbtncheck2').attr('checked', true)
        $('#sessionbtncheck3').attr('checked', true)
        $('#sessionbtncheck4').attr('checked', true)

        $('#sessionbtncheck1').addClass('active')
        $('#sessionbtncheck2').addClass('active')
        $('#sessionbtncheck3').addClass('active')
        $('#sessionbtncheck4').addClass('active')
    });

    $(document).on('click', "#sessionbtncheck5", function () {
        sessionRatingSum = 5;
        addRemoveClass2()
        $('#sessionbtncheck1').attr('checked', true)
        $('#sessionbtncheck2').attr('checked', true)
        $('#sessionbtncheck3').attr('checked', true)
        $('#sessionbtncheck4').attr('checked', true)
        $('#sessionbtncheck5').attr('checked', true)

        $('#sessionbtncheck1').addClass('active')
        $('#sessionbtncheck2').addClass('active')
        $('#sessionbtncheck3').addClass('active')
        $('#sessionbtncheck4').addClass('active')
        $('#sessionbtncheck5').addClass('active')
    });

    function addRemoveClass2() {
        $('#sessionbtncheck1').removeClass('active');
        $('#sessionbtncheck2').removeClass('active');
        $('#sessionbtncheck3').removeClass('active');
        $('#sessionbtncheck4').removeClass('active');
        $('#sessionbtncheck5').removeClass('active');

        $('#sessionbtncheck1').removeAttr('checked');
        $('#sessionbtncheck2').removeAttr('checked');
        $('#sessionbtncheck3').removeAttr('checked');
        $('#sessionbtncheck4').removeAttr('checked');
        $('#sessionbtncheck5').removeAttr('checked');
    }

    $('.submitSessionReview').on('click', function () {
        var program_session_id = $('.program_session_id').val();
        var studentSessionReviewCreateRoute = $('.studentSessionReviewCreateRoute').val();
        toastr.options.positionClass = 'toast-bottom-right';
        if (sessionRatingSum == 0) {
            toastr.error("Rating is required")
            return;
        }
        var feedback2 = $('.feedback2').val();
        $('.feedback2').val(null)
        if (!feedback2) {
            toastr.error("Feedback is required")
            return;
        }
        $('.modal1').modal('hide');

        addRemoveClass2()

        $.ajax({
            type: "POST",
            url: studentSessionReviewCreateRoute,
            data: {'program_session_id': program_session_id, 'rating': sessionRatingSum, 'comment': feedback2, '_token': $('meta[name="csrf-token"]').attr('content')},
            datatype: "json",
            success: function (response) {
                toastr.options.positionClass = 'toast-bottom-right';
                if (response.status == 200) {
                    toastr.success(response.msg)
                }else if (response.status == 302) {
                    toastr.error(response.msg)
                }
            },
            error: function (error) {

            },
        });
    });
})(jQuery)
