<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
    integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



<style>
    .payment-accordion img {
        display: inline-block;
        margin-left: 10px;
        background-color: white;
    }

    form#order-place .form-control {
        border-width: 1px;
        border-color: rgb(57, 78, 175);
        border-style: solid;
        border-radius: 8px;
        background-color: transparent;
        height: 54px;
        padding-left: 15px;
        color: #ffffff;
    }

    form#order-place textarea.form-control {
        height: auto !important;
    }

    .checkoutPage {
        padding: 50px 0px;
    }

    .checkoutPage .section-heading h3 {
        margin-bottom: 30px;
    }

    .YouOrder {
        background-color: #c91d22;
        color: white;
        padding: 25px;
        padding-bottom: 2px;
        min-height: 300px;
        border-radius: 3px;
        margin-bottom: 20px;
    }

    .amount-wrapper {
        padding-top: 12px;
        border-top: 2px solid white;
        text-align: left;
        margin-top: 90px;
    }

    .amount-wrapper h2 {
        font-size: 20px;
        display: flex;
        justify-content: space-between;
    }

    .amount-wrapper h3 {
        display: FLEX;
        justify-content: SPACE-BETWEEN;
        font-size: 22px;
        border-top: 2px solid white;
        padding-top: 10px;
        margin-top: 14px;
    }

    .checkoutPage span.invalid-feedback strong {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        display: block;
        width: 100%;
        font-size: 15px;
        padding: 5px 15px;
        border-radius: 6px;
    }

    .payment-accordion .btn-link {
        display: block;
        width: 100%;
        text-align: left;
        padding: 10px 19px;
        color: black;
    }

    .payment-accordion .card-header {
        padding: 0px !important;
    }

    .payment-accordion .card-header:first-child {
        border-radius: 0px;
    }

    .payment-accordion .card {
        border-radius: 0px;
    }

    .form-group.hide {
        display: none;
    }

    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        border-width: 1px;
        border-color: rgb(150, 163, 218);
        border-style: solid;
        margin-bottom: 10px;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

    div#card-errors {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        display: block;
        width: 100%;

        font-size: 15px;
        padding: 5px 15px;
        border-radius: 6px;
        display: none;
        margin-bottom: 10px;
    }

    .item-count h6 {
        margin: 0;
    }

    .calculate-item {
        padding: 20px;
        background: linear-gradient(to right, #09bfff, #8ee2ff);
    }

    .item-count {
        margin-bottom: 10px;
        justify-content: space-between;
    }
</style>