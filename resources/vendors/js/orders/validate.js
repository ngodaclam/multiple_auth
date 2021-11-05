
$(document).ready(function () {
    /**
     * Validate
     */
    $('#orderForm').validate({
        rules: {
            user_id: {
                number:true,
                required:true,
            },
            partner_id: {
                number:true,
                required: true,

            },
            item_id: {
                number:true,
                required: true,

            },
            amount: {
                required:true,
                number: true,
            },
            invoice_no:{
                required:true,
            },
        },
        messages: {
            user_id : {
                required : "Vui lòng nhập mã khách hàng",
                number: "Yêu cầu nhập đúng mã khách hàng"
            },
            partner_id: {
                required: "Vui lòng nhập mã partner",
                number: "Yêu cầu nhập đúng mã cộng tác viên"
            },
            item_id: {
                required: "Vui lòng nhập mã sản phẩm",
                number: "Yêu cầu nhập đúng mã sản phẩm"
            },
            amount: {
                required: "Vui lòng nhập số lượng sản phẩm",
                number: "Yêu cầu nhập đúng số lượng sản phẩm"
            },
            invoice_no: {
                required: "Vui lòng nhập mã giao dịch",
            }
        },
        submitHandler: function (form) {
            console.log(form);
            form.submit();
        }
    });
})
