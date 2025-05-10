# UrbanNest

UrbanNest is a web application designed to assist migrants in finding rental or sale properties in a new city. It provides an easy-to-use platform for property owners to list their properties and for users to browse, search, and contact owners for renting or buying properties.

## Features

- **Property Listings**: Users can browse properties available for rent or sale.
- **Search & Filter**: Advanced search and filtering options to find suitable properties.
- **User Authentication**: Secure login and registration system.
- **Post Property**: Property owners can list their properties with details.
- **Contact Owners**: Users can connect with property owners for inquiries.
- **Responsive Design**: Fully responsive UI for seamless experience across devices.

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript, Bootstrap, jQuery
- **Backend**: PHP
- **Database**: MySQL
- **Server**: XAMPP

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/Himansu173/UrbanNest.git
   ```
2. Start XAMPP and ensure Apache & MySQL services are running.
3. Import the database:
   - Open phpMyAdmin.
   - Create a new database (e.g., `urbannest_db`).
   - Import the provided SQL file (`urbannest.sql`).
4. Configure database connection:
   - Open `dbconnect.php`.
   - Update the database credentials (`host`, `username`, `password`, `database`).
5. Run the application:
   - Place the project folder in the `htdocs` directory of XAMPP.
   - Open the browser and go to `http://localhost/UrbanNest/`.

## Usage

1. **User Registration/Login**
   - Users need to sign up or log in to explore and post properties.
2. **Browsing Properties**
   - Use the search and filter options to find relevant properties.
3. **Listing a Property**
   - Property owners can add listings with images and details.
4. **Contacting Owners**
   - Interested users can directly contact property owners.

## License

This project is open-source and available under the MIT License.

## Contact

For any queries or feedback, feel free to reach out.

---