<?php
session_start();
?>

<?php 
require "partials/head.php";
?>

<?php 
require "partials/nav.php";
?>


<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Blog</h2>
    
    <!-- Blog Posts -->
    <div class="row">
        <!-- Blog Post 1 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Blog Post Title 1</h5>
                    <p class="card-text">This is a short excerpt from the blog post. It gives a preview of the content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="/blog/post-1" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 2 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Blog Post Title 2</h5>
                    <p class="card-text">This is a short excerpt from the blog post. It gives a preview of the content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="/blog/post-2" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 3 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Blog Post Title 3</h5>
                    <p class="card-text">This is a short excerpt from the blog post. It gives a preview of the content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="/blog/post-3" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 4 -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/500x300" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">Blog Post Title 4</h5>
                    <p class="card-text">This is a short excerpt from the blog post. It gives a preview of the content. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="/blog/post-4" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Előző</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Következő</a>
            </li>
        </ul>
    </nav>
</div>


</body>


<?php 
require "partials/footer.php";
?>

