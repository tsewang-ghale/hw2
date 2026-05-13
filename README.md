# K-Pop Library

K-Pop Library is a PHP and MySQL web application for exploring and managing information about K-pop idol groups, songs, entertainment companies, and awards. The project includes database-driven pages, search, CRUD workflows, and chart-based summaries.

Live site:

https://finalproject.tsewangghale.oucreate.com/index.php

## Features

- View K-pop idol groups, songs, companies, and awards
- Add, edit, and delete records through PHP forms
- Search records by category
- Display chart summaries with Chart.js
- Navigate through a Bootstrap-based interface
- Use image assets and background styling for a polished visual design

## Tech Stack

| Layer | Tools |
| --- | --- |
| Frontend | HTML, CSS, Bootstrap, Chart.js |
| Backend | PHP |
| Database | MySQL |
| Hosting | OU Create |
| Version Control | Git and GitHub |

## Project Structure

| Area | Files |
| --- | --- |
| Main pages | `index.php`, `idol_groups.php`, `songs.php`, `companies.php`, `awards.php`, `search.php` |
| Data models | `model_idol_groups.php`, `model_songs.php`, `model_companies.php`, `model_awards.php` |
| Views | `view_idol_groups.php`, `view_songs.php`, `view_companies.php`, `view_awards.php` |
| Forms | `view_*_newform.php`, `view_*_editform.php` |
| Charts | `songs_chart.php`, `awards_chart.php`, `view_songs_chart.php`, `view_awards_chart.php` |
| Shared utilities | `util_db.php`, `view_header.php`, `view_footer.php` |
| Assets | `b*.jpg`, `b*.jpeg`, `f*.jpg` |

## Learning Outcomes

- Designed a database-backed PHP application
- Practiced CRUD workflows across related tables
- Built category-based search
- Used Chart.js to summarize database records visually
- Organized application code into models, views, and page controllers
- Deployed a web application through OU Create

## Local Setup Notes

This project expects a MySQL database connection in `util_db.php`. To run it locally, use your own database host, username, password, and database name, then serve the project with a PHP-enabled local server.

## Author

Tsewang Diki Ghale
GitHub: [tsewang-ghale](https://github.com/tsewang-ghale)
