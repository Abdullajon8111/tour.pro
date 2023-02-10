@push('after_styles')
    <style>
        .rating-box {
            display: inline-block;
        }
        .rating-box .rating-container {
            direction: rtl !important;
        }
        .rating-box .rating-container label {
            display: inline-block;
            margin: 15px 0;
            color: #d4d4d4;
            cursor: pointer;
            font-size: 2em;
            transition: color 0.2s;
        }
        .rating-box .rating-container input {
            display: none;
        }
        .rating-box .rating-container label:hover, .rating-box .rating-container label:hover ~ label, .rating-box .rating-container input:checked ~ label {
            color: gold;
        }
    </style>
@endpush

<div class="rating-box">
    <div class="rating-container">
        <input type="radio" name="rating" value="5" id="star-5" checked> <label for="star-5">&#9733;</label>
        <input type="radio" name="rating" value="4" id="star-4"> <label for="star-4">&#9733;</label>
        <input type="radio" name="rating" value="3" id="star-3"> <label for="star-3">&#9733;</label>
        <input type="radio" name="rating" value="2" id="star-2"> <label for="star-2">&#9733;</label>
        <input type="radio" name="rating" value="1" id="star-1"> <label for="star-1">&#9733;</label>
    </div>
</div>
