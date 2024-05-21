<?php
function showstar($rate){
    if (0 <= $rate && $rate <= 1) {
        echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
    } else if (1 < $rate && $rate <= 2) {
        echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
    } else if (2 < $rate && $rate <= 3) {
        echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
    } else if (3 < $rate && $rate <= 4) {
        echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
    } else if (4 < $rate && $rate <= 5) {
        echo '<i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>
            <i class="fas fa-star" style="font-size: 1.2rem; color:red"></i>';
    }
}


?>