-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbannest`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `pid` int(11) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `locality` varchar(50) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`pid`, `state`, `city`, `locality`, `pincode`) VALUES
(1000, 'Delhi', 'New Delhi', 'Connaught Place', '110001'),
(1001, 'Maharashtra', 'Mumbai', 'Marine Drive', '400001'),
(1002, 'Uttar Pradesh', 'Lucknow', 'Hazratganj', '226001'),
(1003, 'Kolkata', 'Kolkata', 'Park Street', '700001'),
(1004, 'Gujarat', 'Ahmedabad', 'Law Garden', '380001'),
(1005, 'Rajasthan', 'Jaipur', 'Ashok Nagar', '302001'),
(1006, 'Tamil Nadu', 'Chennai', 'Anna Salai', '600001'),
(1007, 'Telangana', 'Hyderabad', 'Banjara Hills', '500001'),
(1008, 'Punjab', 'Amritsar', 'Mall Road', '143001'),
(1009, 'Karnataka', 'Bengaluru', 'Residency Road', '560001'),
(1010, 'Haryana', 'Gurgaon', 'Cyber Hub', '122002'),
(1011, 'West Bengal', 'Darjeeling', 'Mall Road', '734101'),
(1012, 'Kerala', 'Kochi', 'Marine Drive', '682031'),
(1013, 'Madhya Pradesh', 'Bhopal', 'Arera Colony', '462016'),
(1014, 'Uttarakhand', 'Dehradun', 'Rajpur Road', '248001'),
(1015, 'Goa', 'Panaji', 'Campal', '403001'),
(1016, 'Jharkhand', 'Ranchi', 'Kanke Road', '834008'),
(1017, 'Chhattisgarh', 'Raipur', 'Pandri Market', '492004'),
(1018, 'Himachal Pradesh', 'Shimla', 'Mall Road', '171001'),
(1019, 'Bihar', 'Patna', 'Fraser Road', '800001'),
(1020, 'Assam', 'Guwahati', 'Paltan Bazaar', '781001'),
(1021, 'Odisha', 'Bhubaneswar', 'Jayadev Vihar', '751013'),
(1022, 'Manipur', 'Imphal', 'Thangal Bazar', '795001'),
(1023, 'Meghalaya', 'Shillong', 'Police Bazaar', '793001'),
(1024, 'Nagaland', 'Kohima', 'Main Town', '797001'),
(1025, 'Mizoram', 'Aizawl', 'Chanmari', '796007'),
(1026, 'Tripura', 'Agartala', 'Kaman Chowmuhani', '799001'),
(1027, 'Sikkim', 'Gangtok', 'MG Marg', '737101'),
(1028, 'Arunachal Pradesh', 'Itanagar', 'Bank Tinali', '791111'),
(1029, 'Andhra Pradesh', 'Vishakhapatnam', 'RK Beach', '530017');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `sn` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`sn`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Aarav Sharma', 'aarav.sharma@example.com', 'Rental Inquiry', 'I am interested in renting a 2BHK apartment in Delhi.'),
(2, 'Priya Patel', 'priya.patel@example.com', 'Feedback on Listings', 'The website listings are clear, but I would like to see more filters for price range.'),
(3, 'Rohan Gupta', 'rohan.gupta@example.com', 'Property Visit', 'Can I schedule a visit for the house listed in Marine Drive, Mumbai?'),
(4, 'Sneha Verma', 'sneha.verma@example.com', 'Issue with Payment', 'I faced an issue while paying the booking amount. Please assist.'),
(5, 'Kabir Singh', 'kabir.singh@example.com', 'Search Functionality', 'The search feature is great, but it would be better with location auto-suggestions.'),
(6, 'Ananya Iyer', 'ananya.iyer@example.com', 'Property Details', 'I need more information on the 3BHK house listed in Anna Salai, Chennai.'),
(7, 'Devansh Joshi', 'devansh.joshi@example.com', 'Feedback on Experience', 'The website is user-friendly, but adding a chat support feature would be helpful.'),
(8, 'Ishita Desai', 'ishita.desai@example.com', 'Selling Property', 'I want to list my house for sale. What are the steps involved?'),
(9, 'Naman Kapoor', 'naman.kapoor@example.com', 'Broker Charges', 'Could you clarify the broker charges for rental properties?'),
(10, 'Tanya Mehta', 'tanya.mehta@example.com', 'Property Availability', 'Is the villa in Banjara Hills still available for rent?');

-- --------------------------------------------------------

--
-- Table structure for table `finance_details`
--

CREATE TABLE `finance_details` (
  `pid` int(11) NOT NULL,
  `rent_amount` varchar(10) DEFAULT NULL,
  `security_deposit` varchar(10) DEFAULT NULL,
  `lease_period` varchar(10) DEFAULT NULL,
  `m_charges` varchar(10) DEFAULT NULL,
  `negotiable` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `finance_details`
--

INSERT INTO `finance_details` (`pid`, `rent_amount`, `security_deposit`, `lease_period`, `m_charges`, `negotiable`) VALUES
(1000, '20000', '40000', '12 months', '500', 'Yes'),
(1001, '25000', '50000', '24 months', '700', 'No'),
(1002, '15000', '30000', '6 months', '600', 'Yes'),
(1003, '22000', '44000', '12 months', '500', 'Yes'),
(1004, '18000', '36000', '18 months', '450', 'No'),
(1005, '30000', '60000', '24 months', '800', 'Yes'),
(1006, '27000', '54000', '12 months', '650', 'Yes'),
(1007, '35000', '70000', '36 months', '1000', 'No'),
(1008, '12000', '24000', '6 months', '300', 'Yes'),
(1009, '28000', '56000', '18 months', '750', 'Yes'),
(1010, '22000', '44000', '12 months', '500', 'Yes'),
(1011, '26000', '52000', '18 months', '600', 'No'),
(1012, '15000', '30000', '6 months', '400', 'Yes'),
(1013, '24000', '48000', '24 months', '550', 'Yes'),
(1014, '20000', '40000', '12 months', '500', 'No'),
(1015, '32000', '64000', '36 months', '800', 'Yes'),
(1016, '18000', '36000', '18 months', '450', 'Yes'),
(1017, '27000', '54000', '12 months', '700', 'No'),
(1018, '14000', '28000', '6 months', '350', 'Yes'),
(1019, '30000', '60000', '24 months', '750', 'Yes'),
(1020, '25000', '50000', '18 months', '650', 'No'),
(1021, '20000', '40000', '12 months', '500', 'Yes'),
(1022, '17000', '34000', '6 months', '400', 'Yes'),
(1023, '35000', '70000', '36 months', '900', 'No'),
(1024, '21000', '42000', '18 months', '450', 'Yes'),
(1025, '19000', '38000', '12 months', '550', 'Yes'),
(1026, '30000', '60000', '24 months', '800', 'No'),
(1027, '23000', '46000', '12 months', '500', 'Yes'),
(1028, '28000', '56000', '18 months', '650', 'Yes'),
(1029, '31000', '62000', '36 months', '850', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `listing_type` varchar(50) NOT NULL,
  `listed_by` varchar(50) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `building_type` varchar(30) NOT NULL,
  `house_type` varchar(50) NOT NULL,
  `property_age` varchar(20) DEFAULT 'NA',
  `balcony` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `carpet_area` varchar(20) NOT NULL,
  `status` varchar(20) DEFAULT 'Available',
  `parking` varchar(20) DEFAULT 'NA',
  `furnishing_type` varchar(50) NOT NULL,
  `power_backup` varchar(20) DEFAULT 'No',
  `lift` varchar(10) DEFAULT 'No',
  `floor` varchar(10) DEFAULT 'NA',
  `date_of_listing` date NOT NULL,
  `date_of_available` date NOT NULL,
  `description` text DEFAULT 'No Description Available.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `uid`, `listing_type`, `listed_by`, `property_type`, `building_type`, `house_type`, `property_age`, `balcony`, `area`, `carpet_area`, `status`, `parking`, `furnishing_type`, `power_backup`, `lift`, `floor`, `date_of_listing`, `date_of_available`, `description`) VALUES
(1000, 9000, 'Rent', 'Owner', 'Residential', 'Apartment', '3BHK', '2 years', 'Yes', '1200 sq.ft', '1100 sq.ft', 'Available', 'Available', 'Unfurnished', 'Available', 'Yes', '2nd', '2024-12-01', '2025-01-01', 'Located in a prime locality, this spacious 3BHK apartment boasts a comfortable living experience. With modern amenities such as 24x7 security and power backup, this property ensures a hassle-free lifestyle. Its proximity to schools, markets, and public transport makes it an ideal choice for families.'),
(1001, 9001, 'Sale', 'Builder', 'Residential', 'Apartment', '2BHK', '5 years', 'Yes', '800 sq.ft', '750 sq.ft', 'Available', 'Available', 'Semi-furnished', 'Not Available', 'Yes', '1st', '2024-11-15', '2024-12-15', 'This 2BHK apartment is designed for urban living with a touch of elegance. Located in the vibrant city center, it offers easy access to shopping malls, parks, and major business hubs. With semi-furnished interiors, it’s a ready-to-move-in delight.'),
(1002, 9002, 'PG', 'Agent', 'Residential', 'Apartment', '1BHK', 'New', 'No', '300 sq.ft', '270 sq.ft', 'Available', 'Not Available', 'Furnished', 'Not Available', 'No', 'Ground', '2024-11-10', '2024-12-10', 'Ideal for young professionals and students, this newly constructed PG offers a fully furnished space with all essential amenities. Its central location ensures easy connectivity to educational institutions and offices.'),
(1003, 9003, 'Rent', 'Owner', 'Residential', 'Apartment', '2BHK', '3 years', 'Yes', '1000 sq.ft', '900 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', '3rd', '2024-11-05', '2025-01-05', 'A beautifully furnished 2BHK apartment with modern interiors and amenities. Its spacious layout and prime location near parks and schools make it perfect for families. Enjoy a safe and secure living environment.'),
(1004, 9004, 'Sale', 'Owner', 'Residential', 'House', '1BHK', '10 years', 'No', '600 sq.ft', '550 sq.ft', 'Unavailable', 'Available', 'Unfurnished', 'Not Available', 'Yes', '1st', '2024-10-25', '2024-11-25', 'This 1BHK house, located in a serene neighborhood, offers a peaceful living experience. With ample parking and a well-maintained locality, it is perfect for those looking for a cozy home.'),
(1005, 9005, 'Rent', 'Agent', 'Residential', 'Apartment', '3BHK', '4 years', 'Yes', '1400 sq.ft', '1300 sq.ft', 'Available', 'Available', 'Semi-furnished', 'Available', 'No', '4th', '2024-12-02', '2025-01-02', 'Enjoy the comfort of this semi-furnished 3BHK apartment, located in a well-connected area. The property features modern amenities and a spacious balcony, ideal for unwinding after a long day.'),
(1006, 9006, 'PG', 'Owner', 'Residential', 'House', '1BHK', 'New', 'No', '250 sq.ft', '220 sq.ft', 'Available', 'Not Available', 'Furnished', 'Available', 'No', 'Ground', '2024-11-12', '2024-12-12', 'This newly built PG is fully furnished and perfect for students and single professionals. Situated in a peaceful locality, it ensures a comfortable stay with all basic facilities.'),
(1007, 9007, 'Sale', 'Builder', 'Commercial', 'Office Space', '2BHK', '8 years', 'Yes', '1800 sq.ft', '1700 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', '5th', '2024-12-01', '2025-01-01', 'A premium office space designed to meet all your business needs. Located in a commercial hub, it offers modern facilities and excellent connectivity to key areas of the city.'),
(1008, 9008, 'Rent', 'Owner', 'Residential', 'Apartment', '2BHK', '2 years', 'No', '950 sq.ft', '850 sq.ft', 'Available', 'Not Available', 'Unfurnished', 'Not Available', 'No', '2nd', '2024-11-14', '2025-01-14', 'An unfurnished 2BHK apartment in a peaceful locality. Perfect for those looking to customize their living space. Conveniently located near public transport and essential services.'),
(1009, 9009, 'PG', 'Agent', 'Residential', 'Apartment', '3BHK', 'New', 'Yes', '350 sq.ft', '300 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', 'Ground', '2024-11-20', '2024-12-20', 'This newly constructed PG offers a comfortable and fully furnished living experience. With modern amenities and a safe environment, it’s perfect for students and working professionals.'),
(1010, 9010, 'Sale', 'Builder', 'Residential', 'Villa', '4BHK', '1 year', 'Yes', '2500 sq.ft', '2300 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', 'Duplex', '2024-12-01', '2025-01-01', 'Step into luxury with this magnificent 4BHK villa, designed to offer premium living. With spacious rooms, top-notch furnishings, and a private garden, this villa is perfect for those seeking elegance and comfort. Located in an upscale neighborhood, it provides easy access to major city hubs.'),
(1011, 9011, 'Rent', 'Agent', 'Commercial', 'Shop', 'Single Room', '5 years', 'No', '400 sq.ft', '380 sq.ft', 'Available', 'Available', 'Unfurnished', 'Not Available', 'No', 'Ground', '2024-11-30', '2024-12-30', 'An ideal commercial space for rent, this 400 sq.ft shop is located in a bustling marketplace. Its high footfall area and ample parking make it perfect for businesses looking to thrive.'),
(1012, 9012, 'Sale', 'Owner', 'Residential', 'Apartment', '2BHK', '3 years', 'Yes', '1000 sq.ft', '950 sq.ft', 'Available', 'Not Available', 'Semi-furnished', 'Available', 'Yes', '2nd', '2024-11-28', '2025-01-01', 'A semi-furnished 2BHK apartment designed to meet all your family’s needs. Situated in a gated community with 24x7 security and amenities like a swimming pool and gym.'),
(1013, 9013, 'PG', 'Agent', 'Residential', 'House', 'Studio', 'New', 'No', '200 sq.ft', '180 sq.ft', 'Available', 'Not Available', 'Furnished', 'Available', 'No', 'Ground', '2024-11-25', '2024-12-25', 'This fully furnished studio PG is a perfect match for solo tenants. Located in a quiet neighborhood with easy access to cafes and transport links, it promises a cozy stay.'),
(1014, 9014, 'Rent', 'Owner', 'Residential', 'Apartment', '1BHK', '4 years', 'No', '600 sq.ft', '550 sq.ft', 'Available', 'Not Available', 'Fully Furnished', 'Not Available', 'Yes', '1st', '2024-11-22', '2024-12-22', 'A fully furnished 1BHK apartment offering modern comforts and conveniences. Situated in a well-connected area close to shopping centers and public transport.'),
(1015, 9015, 'Sale', 'Builder', 'Commercial', 'Office Space', 'Open Layout', '7 years', 'No', '1200 sq.ft', '1150 sq.ft', 'Available', 'Available', 'Semi-furnished', 'Available', 'Yes', '3rd', '2024-11-20', '2025-01-01', 'A strategically located office space with an open layout to accommodate various business setups. Equipped with essential amenities, it ensures a productive work environment.'),
(1016, 9016, 'Rent', 'Agent', 'Residential', 'Apartment', '3BHK', '6 years', 'Yes', '1500 sq.ft', '1400 sq.ft', 'Available', 'Available', 'Unfurnished', 'Available', 'No', '5th', '2024-12-10', '2025-01-10', 'An expansive 3BHK apartment ideal for larger families. The property is well-lit and ventilated, offering a peaceful living experience. Located close to schools and supermarkets.'),
(1017, 9017, 'Sale', 'Owner', 'Residential', 'Villa', '5BHK', '2 years', 'Yes', '3000 sq.ft', '2800 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', 'Duplex', '2024-12-15', '2025-01-15', 'Experience grandeur in this luxurious 5BHK villa featuring opulent interiors, a private pool, and a landscaped garden. Located in a high-end community, it promises an exclusive lifestyle.'),
(1018, 9018, 'PG', 'Owner', 'Residential', 'Apartment', '2BHK', 'New', 'Yes', '400 sq.ft', '350 sq.ft', 'Available', 'Not Available', 'Fully Furnished', 'Available', 'Yes', '1st', '2024-11-18', '2024-12-18', 'A newly constructed 2BHK PG offering fully furnished accommodations with modern amenities. Perfect for working professionals seeking convenience and comfort.'),
(1019, 9019, 'Rent', 'Agent', 'Commercial', 'Shop', 'Single Room', '3 years', 'No', '450 sq.ft', '420 sq.ft', 'Available', 'Available', 'Unfurnished', 'Not Available', 'No', 'Ground', '2024-12-05', '2024-12-30', 'A commercial shop space located in a high-traffic area. Ideal for retail businesses, it offers excellent visibility and accessibility.'),
(1020, 9020, 'Sale', 'Builder', 'Residential', 'Apartment', '3BHK', '1 year', 'Yes', '1800 sq.ft', '1700 sq.ft', 'Available', 'Available', 'Semi-furnished', 'Available', 'Yes', '6th', '2024-12-02', '2025-01-02', 'This semi-furnished 3BHK apartment is designed for modern living, with spacious interiors and premium amenities. Located in a sought-after neighborhood, it ensures a perfect blend of comfort and convenience.'),
(1021, 9021, 'Sale', 'Agent', 'Residential', 'Apartment', '2BHK', '6 years', 'Yes', '950 sq.ft', '920 sq.ft', 'Available', 'Not Available', 'Furnished', 'Available', 'Yes', '3rd', '2024-12-10', '2025-01-10', 'A cozy and well-maintained 2BHK apartment with all the necessary fittings. Located in a quiet and serene locality, this property offers easy access to schools, parks, and shopping centers.'),
(1022, 9022, 'Rent', 'Owner', 'Residential', 'Office Space', '2BHK', '6 years', 'Yes', '950 sq.ft', '920 sq.ft', 'Available', 'Not Available', 'Furnished', 'Available', 'Yes', '3rd', '2024-12-10', '2025-01-10', 'A compact and comfortable studio PG perfect for students or working professionals. Fully furnished and located in a peaceful neighborhood, it offers a convenient stay with excellent connectivity.'),
(1023, 9023, 'Rent', 'Owner', 'Commercial', 'Office Space', 'Open Layout', '2 years', 'Yes', '1200 sq.ft', '1150 sq.ft', 'Available', 'Available', 'Semi-furnished', 'Available', 'Yes', '2nd', '2024-12-03', '2025-01-03', 'A spacious open-layout office space with a modern design, ideal for a growing business. It’s located in a prime commercial district with easy access to transportation hubs.'),
(1024, 9024, 'Sale', 'Builder', 'Residential', 'Apartment', '3BHK', '8 years', 'Yes', '1500 sq.ft', '1400 sq.ft', 'Available', 'Available', 'Unfurnished', 'Not Available', 'Yes', '4th', '2024-11-28', '2025-01-28', 'This 3BHK apartment provides ample space for families. Located in a well-established neighborhood, it is near schools, hospitals, and shopping centers, making it an ideal place to live.'),
(1025, 9025, 'Rent', 'Agent', 'Residential', 'Apartment', '2BHK', '4 years', 'Yes', '1000 sq.ft', '950 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', '3rd', '2024-12-04', '2025-01-04', 'A well-furnished 2BHK apartment with a modern kitchen and comfortable living spaces. Situated in a safe and quiet residential area with good connectivity to major city spots.'),
(1026, 9026, 'PG', 'Agent', 'Residential', 'Apartment', '1BHK', 'New', 'Yes', '350 sq.ft', '330 sq.ft', 'Available', 'Not Available', 'Fully Furnished', 'Available', 'No', 'Ground', '2024-12-07', '2024-12-21', 'This newly constructed 1BHK PG offers fully furnished rooms, perfect for those who prioritize comfort and security. Located in a vibrant and well-connected locality.'),
(1027, 9027, 'Sale', 'Owner', 'Residential', 'Office Space', '4BHK', '6 years', 'Yes', '3000 sq.ft', '2800 sq.ft', 'Available', 'Available', 'Fully Furnished', 'Available', 'Yes', 'Duplex', '2024-12-09', '2025-01-09', 'A luxurious 4BHK villa with state-of-the-art amenities, including a private pool and garden. Located in a premium gated community, it offers a tranquil and high-end living experience.'),
(1028, 9028, 'Rent', 'Owner', 'Commercial', 'House', '1BHK', '3 years', 'No', '400 sq.ft', '380 sq.ft', 'Available', 'Available', 'Unfurnished', 'Not Available', 'No', 'Ground', '2024-12-10', '2025-01-10', 'This commercial shop space offers an excellent opportunity for retail businesses. Its prime location guarantees high visibility and foot traffic in a bustling area.'),
(1029, 9029, 'Sale', 'Builder', 'Residential', 'Apartment', '2BHK', '7 years', 'Yes', '1100 sq.ft', '1050 sq.ft', 'Available', 'Available', 'Semi-furnished', 'Available', 'Yes', '5th', '2024-12-12', '2025-01-12', 'A spacious 2BHK apartment offering a great balance of comfort and style. The semi-furnished setup makes it easy for you to personalize the space according to your needs. Located near transportation hubs for easy commuting.');

-- --------------------------------------------------------

--
-- Table structure for table `property_photo`
--

CREATE TABLE `property_photo` (
  `phid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `imgpath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_photo`
--

INSERT INTO `property_photo` (`phid`, `pid`, `imgpath`) VALUES
(1, 1000, 'property_images/img1.jpg'),
(2, 1000, 'property_images/img2.jpg'),
(3, 1000, 'property_images/img3.jpg'),
(4, 1001, 'property_images/img4.jpg'),
(5, 1001, 'property_images/img5.jpg'),
(6, 1001, 'property_images/img6.jpg'),
(7, 1002, 'property_images/img7.jpg'),
(8, 1002, 'property_images/img8.jpg'),
(9, 1002, 'property_images/img9.jpg'),
(10, 1003, 'property_images/img10.jpg'),
(11, 1003, 'property_images/img11.jpg'),
(12, 1003, 'property_images/img12.jpg'),
(13, 1004, 'property_images/img13.jpg'),
(14, 1004, 'property_images/img14.jpg'),
(15, 1004, 'property_images/img15.jpg'),
(16, 1005, 'property_images/img16.jpg'),
(17, 1005, 'property_images/img17.jpg'),
(18, 1005, 'property_images/img18.jpg'),
(19, 1006, 'property_images/img19.jpg'),
(20, 1006, 'property_images/img20.jpg'),
(21, 1006, 'property_images/img21.jpg'),
(22, 1007, 'property_images/img22.jpg'),
(23, 1007, 'property_images/img23.jpg'),
(24, 1007, 'property_images/img24.jpg'),
(25, 1008, 'property_images/img25.jpg'),
(26, 1008, 'property_images/img26.jpg'),
(27, 1008, 'property_images/img27.jpg'),
(28, 1009, 'property_images/img28.jpg'),
(29, 1009, 'property_images/img29.jpg'),
(30, 1009, 'property_images/img30.jpg'),
(31, 1010, 'property_images/img31.jpg'),
(32, 1010, 'property_images/img32.jpg'),
(33, 1010, 'property_images/img33.jpg'),
(34, 1011, 'property_images/img34.jpg'),
(35, 1011, 'property_images/img35.jpg'),
(36, 1011, 'property_images/img36.jpg'),
(37, 1012, 'property_images/img37.jpg'),
(38, 1012, 'property_images/img38.jpg'),
(39, 1012, 'property_images/img39.jpg'),
(40, 1013, 'property_images/img1.jpg'),
(41, 1013, 'property_images/img2.jpg'),
(42, 1013, 'property_images/img3.jpg'),
(43, 1014, 'property_images/img4.jpg'),
(44, 1014, 'property_images/img5.jpg'),
(45, 1014, 'property_images/img6.jpg'),
(46, 1015, 'property_images/img7.jpg'),
(47, 1015, 'property_images/img8.jpg'),
(48, 1015, 'property_images/img9.jpg'),
(49, 1016, 'property_images/img10.jpeg'),
(50, 1016, 'property_images/img11.jpeg'),
(51, 1016, 'property_images/img12.jpeg'),
(52, 1017, 'property_images/img13.jpg'),
(53, 1017, 'property_images/img14.jpg'),
(54, 1017, 'property_images/img15.jpg'),
(55, 1018, 'property_images/img16.jpg'),
(56, 1018, 'property_images/img17.jpg'),
(57, 1018, 'property_images/img18.jpg'),
(58, 1019, 'property_images/img19.jpg'),
(59, 1019, 'property_images/img20.jpg'),
(60, 1019, 'property_images/img21.jpg'),
(61, 1020, 'property_images/img22.jpg'),
(62, 1020, 'property_images/img23.jpg'),
(63, 1020, 'property_images/img24.jpg'),
(64, 1021, 'property_images/img25.jpg'),
(65, 1021, 'property_images/img26.jpg'),
(66, 1021, 'property_images/img27.jpg'),
(67, 1022, 'property_images/img28.jpg'),
(68, 1022, 'property_images/img29.jpg'),
(69, 1022, 'property_images/img30.jpg'),
(70, 1023, 'property_images/img31.jpg'),
(71, 1023, 'property_images/img32.jpg'),
(72, 1023, 'property_images/img33.jpg'),
(73, 1024, 'property_images/img34.jpg'),
(74, 1024, 'property_images/img35.jpg'),
(75, 1024, 'property_images/img36.jpg'),
(76, 1025, 'property_images/img37.jpg'),
(77, 1025, 'property_images/img38.jpg'),
(78, 1025, 'property_images/img39.jpg'),
(79, 1026, 'property_images/img1.jpg'),
(80, 1026, 'property_images/img2.jpg'),
(81, 1026, 'property_images/img3.jpg'),
(82, 1027, 'property_images/img4.jpg'),
(83, 1027, 'property_images/img5.jpg'),
(84, 1027, 'property_images/img6.jpg'),
(85, 1028, 'property_images/img7.jpg'),
(86, 1028, 'property_images/img8.jpg'),
(87, 1028, 'property_images/img9.jpg'),
(88, 1029, 'property_images/img10.jpeg'),
(89, 1029, 'property_images/img11.jpeg'),
(90, 1029, 'property_images/img12.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT './users_profile_images/default_profile_image.jpeg',
  `bg_pic` varchar(255) DEFAULT './users_bg_images/default_bg_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `contact`, `address`, `password`, `profile_pic`, `bg_pic`) VALUES
(9000, 'Aarav Sharma', 'aarav.sharma@example.com', '9876543210', '123 MG Road, Delhi', 'abc123', './users_profile_images/9000.jpeg', './users_bg_images/img1.jpg'),
(9001, 'Priya Patel', 'priya.patel@example.com', '9876543211', '45 Banjara Hills, Hyderabad', 'xyz789', './users_profile_images/9001.jpeg', './users_bg_images/img2.jpg'),
(9002, 'Rohan Gupta', 'rohan.gupta@example.com', '9876543212', '98 Residency Road, Bengaluru', 'gupta1', './users_profile_images/9002.jpeg', './users_bg_images/img3.jpg'),
(9003, 'Sneha Verma', 'sneha.verma@example.com', '9876543213', '67 Park Street, Kolkata', 'verma2', './users_profile_images/9003.jpeg', './users_bg_images/img4.jpg'),
(9004, 'Kabir Singh', 'kabir.singh@example.com', '9876543214', '11 Marine Drive, Mumbai', 'singh3', './users_profile_images/9004.jpeg', './users_bg_images/img5.jpg'),
(9005, 'Ananya Iyer', 'ananya.iyer@example.com', '9876543215', '22 Anna Salai, Chennai', 'iyer99', './users_profile_images/9005.jpeg', './users_bg_images/img6.jpg'),
(9006, 'Devansh Joshi', 'devansh.joshi@example.com', '9876543216', '34 Gota Road, Ahmedabad', 'joshi22', './users_profile_images/9006.jpeg', './users_bg_images/img7.jpg'),
(9007, 'Ishita Desai', 'ishita.desai@example.com', '9876543217', '88 Law Garden, Ahmedabad', 'desai33', './users_profile_images/9007.jpeg', './users_bg_images/img8.jpg'),
(9008, 'Naman Kapoor', 'naman.kapoor@example.com', '9876543218', '19 Juhu Beach Road, Mumbai', 'kapoor7', './users_profile_images/9008.jpeg', './users_bg_images/img9.jpg'),
(9009, 'Tanya Mehta', 'tanya.mehta@example.com', '9876543219', '15 Charminar Lane, Hyderabad', 'mehta12', './users_profile_images/9009.jpeg', './users_bg_images/img10.jpg'),
(9010, 'Arjun Jain', 'arjun.jain@example.com', '9876543220', '40 Lalbagh Road, Bengaluru', 'jain10', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img11.jpg'),
(9011, 'Sanya Malhotra', 'sanya.malhotra@example.com', '9876543221', '25 Connaught Place, Delhi', 'sm1234', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img12.jpg'),
(9012, 'Ayaan Reddy', 'ayaan.reddy@example.com', '9876543222', '90 Begumpet Road, Hyderabad', 'ar567', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img13.jpg'),
(9013, 'Riya Nair', 'riya.nair@example.com', '9876543223', '77 MG Road, Kochi', 'nair99', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img14.jpg'),
(9014, 'Aditya Roy', 'aditya.roy@example.com', '9876543224', '33 Esplanade, Kolkata', 'roy45', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img15.jpg'),
(9015, 'Kavya Aggarwal', 'kavya.aggarwal@example.com', '9876543225', '50 Ashok Nagar, Jaipur', 'ka890', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img1.jpg'),
(9016, 'Rachit Chawla', 'rachit.chawla@example.com', '9876543226', '18 Hazratganj, Lucknow', 'rc555', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img2.jpg'),
(9017, 'Manisha Thakur', 'manisha.thakur@example.com', '9876543227', '89 Sector 15, Chandigarh', 'mt234', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img3.jpg'),
(9018, 'Vivek Bhardwaj', 'vivek.bhardwaj@example.com', '9876543228', '100 Civil Lines, Kanpur', 'vb66', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img4.jpg'),
(9019, 'Nidhi Saxena', 'nidhi.saxena@example.com', '9876543229', '56 Gomti Nagar, Lucknow', 'ns321', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img5.jpg'),
(9020, 'Ishaan Kaul', 'ishaan.kaul@example.com', '9876543230', '33 Residency Road, Bengaluru', 'ik98', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img6.jpg'),
(9021, 'Pooja Chopra', 'pooja.chopra@example.com', '9876543231', '22 MG Road, Delhi', 'pc12', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img7.jpg'),
(9022, 'Kunal Deshmukh', 'kunal.deshmukh@example.com', '9876543232', '11 FC Road, Pune', 'kd78', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img8.jpg'),
(9023, 'Simran Gill', 'simran.gill@example.com', '9876543233', '88 Mall Road, Amritsar', 'sg23', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img9.jpg'),
(9024, 'Yash Khurana', 'yash.khurana@example.com', '9876543234', '77 GT Road, Ludhiana', 'yk88', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img10.jpg'),
(9025, 'Reena Srivastava', 'reena.srivastava@example.com', '9876543235', '55 Ashok Nagar, Jaipur', 'rs78', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img11.jpg'),
(9026, 'Akash Dubey', 'akash.dubey@example.com', '9876543236', '11 Lalbagh Road, Bengaluru', 'ad123', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img12.jpg'),
(9027, 'Tara Menon', 'tara.menon@example.com', '9876543237', '90 Marine Drive, Mumbai', 'tm45', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img13.jpg'),
(9028, 'Rajiv Das', 'rajiv.das@example.com', '9876543238', '33 Chowringhee, Kolkata', 'rd99', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img14.jpg'),
(9029, 'Meera Bansal', 'meera.bansal@example.com', '9876543239', '45 Banjara Hills, Hyderabad', 'mb56', './users_profile_images/default_profile_image.jpeg', './users_bg_images/img15.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `finance_details`
--
ALTER TABLE `finance_details`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`phid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1030;

--
-- AUTO_INCREMENT for table `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `phid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9030;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `property` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `finance_details`
--
ALTER TABLE `finance_details`
  ADD CONSTRAINT `finance_details_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `property` (`pid`) ON DELETE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `property` (`pid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
