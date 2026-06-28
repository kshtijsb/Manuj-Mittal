<?php
// The Data Brain: Centralized content management
$author_name = "Manuj Mittal";
$developer_name = "Kshitij Bhilare";

$books = [
    [
        "id" => "eternal-archive",
        "title" => "PERSONAL <Br>OPERATING SYSTEM ©",
        "tag" => "Latest Release",
        "meta" => "Philosophical Fiction",
        "price_start" => "$5.23",
        "amazon_url" => "https://www.amazon.com/dp/B0H2RZTJC8",
        "formats" => [
            "hardcover" => ["price" => "28.99", "label" => "Premium Hardcover Edition", "url" => "https://www.amazon.com/dp/B0H6Q7S44D"],
            "paperback" => ["price" => "14.50", "label" => "Classic Paperback Edition", "url" => "https://www.amazon.com/dp/B0H6R1L3DT"],
            "amazon Kindle" => ["price" => "5.23", "label" => "Digital Edition for Kindle", "url" => "https://www.amazon.com/dp/B0H2RZTJC8"],
            "apple iBOOK" => ["price" => "5.23", "label" => "Digital Edition for Apple Devices", "url" => "http://books.apple.com/us/book/id6785050847"]
        ],
        "desc" => "Book on upskilling personal life management. A series of thought provoking reflective quotations to help you maximize your performance.",
        "image" => "book cover.jpeg",
        "status" => "available"
    ],
    [
        "id" => "flip-the-script",
        "title" => "FLIP THE SCRIPT",
        "cover_title" => "RE-IMAGINE EDUCATION",
        "tag" => "Upcoming Release",
        "meta" => "Scheduled launch September 2026",
        "desc" => "Scheduled launch September 2026.",
        "status" => "coming-soon"
    ]
];
?>