<template>
    <div class="error-page">
        <img src="https://www.google.com/images/errors/robot.png" alt="Error 404" class="error-image">
        <h1 class="error-title">404</h1>
        <p class="error-message">Page not found</p>
    </div>
</template>

<style scoped>
.error-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f8f9fa;
}

.error-image {
    width: 200px;
    height: 200px;
    animation: rotate 4s infinite linear;
}

.error-title {
    font-size: 48px;
    color: #dc3545;
    margin-top: 20px;
}

.error-message {
    font-size: 24px;
    color: #343a40;
    margin-top: 10px;
}

@keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
