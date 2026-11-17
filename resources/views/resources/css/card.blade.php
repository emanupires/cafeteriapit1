<style>
    .card {
        /* z-index: 1; */
        display: flex;
        flex-direction: row;
        flex-basis: 100%;
        flex-grow: 1;

        height: 12rem;
        background: rgba(143, 137, 137, 0.32);
        border-radius: 10px;
        margin: 15px auto;
    }

    .card:hover {
        background: rgba(143, 137, 137, 0.5);
    }

    .card-image-div {
        display: flex;
        flex-grow: 1;
        justify-content: center;

        margin: 20px;
        width: 200px;
        height: 150px;
    }

    .card-text { 
        flex-grow: 10;

        margin: 20px 0;
    }

    .card-button-area {
        display: flex;
        flex-direction: column;
    }

    .card-button {
        flex-basis: 50%;
        height: 100%;
    }

    .card-button-edit {
        background-color: yellow;
        z-index: 2;
    }

    .card-button-delete {
        background-color: red;
    }
    
    .card-button-add-area {
        flex-basis: 100%;
    }

    .card-button-add {
        background-color: green;
        width: 100%;
    }

    .product-edit {
        display: flex;
        justify-content: center;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .product-edit *{
        flex-basis: 100%;
    }

    .product-edit .form-group {
        display: flex;
        margin: 10px auto;
    }

    .product-edit .form-group label {
        flex-basis: 15%;
    }

    .product-edit .form-group input {
        flex-basis: 85%;
    }

    .product-edit .form-group select {
        flex-basis: 85%;
    }

    .product-edit .form-group .imgs-grid {
        flex-basis: 85%;
    }

    .product-display-area {
        display: flex;
        flex-direction: column;
    }

    .product-display-header {
        font-weight: bold;
        font-size: 3rem;
    }

    .product-display-body {
        display: flex;
        flex-direction: row;

        height: 100%;
    }

    .product-display-img {
        display: flex;
        flex-basis: 40%;
        justify-content: center;
    }

    .product-display-img img {
        width: 200px;
        height: auto;
    }

    .product-display-description {
        display: flex;
        flex-direction: column;

        flex-basis: 60%;
        font-size: 2rem;
    }

    .product-display-description * {
        flex-basis: 100%;
    }
</style>