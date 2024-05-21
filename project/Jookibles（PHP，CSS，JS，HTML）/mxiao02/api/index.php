<?php
header('Content-Type: application/json');
//connect db
include("conn.php");
include("get.php");
$info = "endpoint incorrect";
$data = array();
//show one book:

if (isset($_GET['id'])) {
    $bid = $_GET['id'];
    if (!empty($bid)) {
        $onebook = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre, project.averageRating, project.ratingsCount FROM project 
                    INNER JOIN author ON project.authors = author.author_id
                    INNER JOIN pr2genre ON project.genre = pr2genre.id
                    INNER JOIN publisher ON project.publisher = publisher.pu_id
                    WHERE b_id = $bid;";
        $res = $conn->query($onebook);
        if (!$res) {
            $info = "$conn->error";
        } else {
            $info = "SUCCESS";
            while ($row = $res->fetch_assoc()) {
                array_push($data, $row);
            }
        }
    } else {
        echo "parameter needs a value";
    }
} else {
    //all book:
    $allbook = "SELECT project.b_id,project.apiURI,project.title,author.author,publisher.name,project.publishedDate,project.description,project.identifier,project.pageCount,project.categories,project.thumbnailURI,project.previewURI,project.infoURI,project.snippet,project.price,pr2genre.genre, project.averageRating, project.ratingsCount FROM project 
    INNER JOIN author ON project.authors = author.author_id
    INNER JOIN pr2genre ON project.genre = pr2genre.id
    INNER JOIN publisher ON project.publisher = publisher.pu_id;";
    $res = $conn->query($allbook);
    if (!$res) {
        $info = "SQL error";
    } else {
        $info = "SUCCESS";
        while ($row = $res->fetch_assoc()) {
            array_push($data, $row);
        }
    }
}



$response = array("message" => $data, "status" => $info);

echo json_encode($response);
