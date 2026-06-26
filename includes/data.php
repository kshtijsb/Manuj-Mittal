<?php
// The Data Brain: Centralized content management
$author_name = "Manuj Mittal";
$developer_name = "Kshitij Bhilare";

$books = [
    [
        "id" => "eternal-archive",
        "title" => "Personal Operating System ©",
        "tag" => "Latest Release",
        "meta" => "Philosophical Fiction",
        "price_start" => "$5.23",
        "amazon_url" => "https://www.amazon.com/dp/B0H2RZTJC8",
        "formats" => [
            "ebook" => ["price" => "5.23", "label" => "Kindle & Apple eBook", "url" => "https://www.amazon.com/dp/B0H2RZTJC8"],
            "paperback" => ["price" => "14.50", "label" => "Amazon & Self-Fulfillment", "url" => "https://www.amazon.com/dp/B0H6R1L3DT"],
            "hardcover" => ["price" => "28.99", "label" => "Amazon & Self-Fulfillment", "url" => "https://www.amazon.com/dp/B0H6Q7S44D"]
        ],
        "desc" => "Your most ambitious work. A journey through the echoes of forgotten memories and lost civilizations.",
        "image" => "book cover.jpeg",
        "status" => "available"
    ],
    [
        "id" => "flip-the-script",
        "title" => "Flip the Script",
        "tag" => "Upcoming Release",
        "meta" => "Scheduled launch October 2027",
        "desc" => "Scheduled launch October 2027.",
        "status" => "coming-soon"
    ]
];
?>