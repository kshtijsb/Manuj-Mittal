<?php
// The Data Brain: Centralized content management
$author_name = "Manuj Mittal";
$developer_name = "Kshitij Bhilare";

$books = [
    [
        "id" => "eternal-archive",
        "title" => "The Eternal Archive",
        "tag" => "Latest Release",
        "meta" => "Philosophical Fiction",
        "price_start" => "$5.23",
        "amazon_url" => "https://www.amazon.com/dp/placeholder",
        "formats" => [
            "ebook" => ["price" => "5.23", "label" => "Kindle & Apple eBook"],
            "paperback" => ["price" => "14.50", "label" => "Amazon & Self-Fulfillment"],
            "hardcover" => ["price" => "28.99", "label" => "Amazon & Self-Fulfillment"]
        ],
        "desc" => "Your most ambitious work. A journey through the echoes of forgotten memories and lost civilizations.",
        "image" => "book cover.jpeg",
        "status" => "available"
    ],
    [
        "id" => "whispers-wind",
        "title" => "Whispers of the Wind",
        "tag" => "Coming Soon",
        "meta" => "Fantasy",
        "price" => null,
        "desc" => "Enter a world where sound is a physical force and silence is the ultimate weapon.",
        "image" => null, // Will use mystery cover
        "status" => "coming-soon"
    ],
    [
        "id" => "project-echo",
        "title" => "Project: Echo",
        "tag" => "Coming Soon",
        "meta" => "Mystery",
        "price" => null,
        "desc" => "A gripping psychological thriller currently in final manuscripts. Join the inner circle to be the first to unlock the secrets within.",
        "image" => null, // Will use mystery cover
        "status" => "coming-soon"
    ]
];
?>