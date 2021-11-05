
    $(document).ready(function () {
    /**
     * Validate
     */
    $('#partnerForm').validate({
        rules: {
            name: {
                required:true,
            },
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true,
                regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            },
            mobile: {
                required:true,
                number: true,
                minlength: 10,
                maxlength: 10,
            },
            cmtnd:{
                required:true,
                minlength: 9,
                maxlength: 12,
            },
            birthday: {
                required:true,
            },
            referral_code:{
                // required:true,
                minlength: 6,
                maxlength: 6,
            },
            promo_code: {
                //required:true,
                minlength: 12,
                maxlength: 12,
            }
        },
        messages: {
            name : {
                required : "Vui lòng nhập tên cộng tác viên"
            },
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 6 kí tự"
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Vui Lòng Nhập Đúng Định Dạng Email",
                regex: "Vui Lòng Nhập Đúng Định Dạng Email"
            },
            mobile : {
                required: "Vui lòng nhập số điện thoại",
                number: "Yêu Cầu Nhập Số Điện Thoại",
                minlength: "Số Điện Thoại Phải Đủ 10 Số ",
                maxlength: "Số Điện Thoại Không Được quá 10 Số "
            },
            cmtnd: {
                required: "Vui lòng cung cấp cmtnd/cccd",
                minlength: "CMTND phải có ít nhất  9 số ",
                maxlength: "CMTND có không được quá 12 số ",
            },
            birthday: {
                required: "Vui lòng cung cấp ngày sinh"
            },
            referral_code: {
                required: "Vui lòng nhập referal code",
                minlength: "Referral code Phải Đủ 6 ký tự ",
                maxlength: "Referral code Không Được quá 6 ký tự "
            },
            promo_code: {
                minlength: "Referral code Phải Đủ 12 ký tự ",
                maxlength: "Referral code Không Được quá 12 ký tự "
            },


        },
        submitHandler: function (form) {
            console.log(form);
            form.submit();
        }
    });
    $.validator.addMethod(
    "regex",
    /* The function that tests a given string against a given regEx. */
    function (value, element, regexp) {
    /* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/

    if (regexp && regexp.constructor !== RegExp) {
    /* Create a new regular expression using the regex argument. */
    regexp = new RegExp(regexp);
}

    /* Check whether the argument is global and, if so set its last index to 0. */
    else if (regexp.global) regexp.lastIndex = 0;

    /* Return whether the element is optional or the result of the validation. */
    return this.optional(element) || regexp.test(value);
});

})
