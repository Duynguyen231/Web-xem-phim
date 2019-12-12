-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2019 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_account`
--

INSERT INTO `admin_account` (`id`, `username`, `password`) VALUES
(1, 'dung', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` int(11) NOT NULL,
  `tenphim` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `daodien` varchar(100) NOT NULL,
  `thongtin` varchar(1024) NOT NULL,
  `theloai` int(11) NOT NULL,
  `namsx` year(4) NOT NULL,
  `quocgia` int(11) NOT NULL,
  `thoiluong` time NOT NULL,
  `linkphim` varchar(100) NOT NULL,
  `linktrailer` varchar(100) NOT NULL,
  `dienvien` varchar(255) NOT NULL,
  `luotxem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `tenphim`, `hinh`, `daodien`, `thongtin`, `theloai`, `namsx`, `quocgia`, `thoiluong`, `linkphim`, `linktrailer`, `dienvien`, `luotxem`) VALUES
(14, 'Spiderman - Home coming', '../admin/uploads/images/3.jpg', 'Jon Watts', 'Tạm biệt hai franchise về thời sinh viên, Spider-Man: Homecoming sẽ lần đầu tiên đưa các khán giả đến với cuộc sống trung học của Peter Paker – siêu anh hùng Người Nhện. Liệu một cậu bé chưa trưởng thành sẽ làm thế nào để cân bằng cuộc sống bình thường và trách nhiệm của một anh hùng giải cứu thế giới.\r\nSau những sự kiện ở Captain America: Civil War, Peter Parker trở về cuộc sống thường nhật, tiếp tục làm cậu học sinh trung học nhút nhát trong mắt bạn bè. Song song đó, chàng thiếu niên 15 tuổi vẫn có thể làm người hùng bảo vệ New York nhờ bộ giáp do Tony Stark / Iron Man (Robert Downey Jr.) tặng cho và nằm dưới sự giám sát từ xa của Happy Hogan (Jon Favreau).', 2, 2017, 4, '02:21:12', 'video/3.mp4', 'https://www.youtube.com/embed/39udgGPyYMg', ' Tom Holland, Michael Keaton, Robert Downey, Marisa Tomei, Jon Favreau', 7),
(15, 'Avengers 3: Infinity War', '../admin/uploads/images/2.jpg', 'Anthony Russo, Joe Russo', 'Sau chuyến hành trình độc nhất vô nhị không ngừng mở rộng và phát triển vụ trũ điện ảnh Marvel, bộ phim Avengers: Cuộc Chiến Vô Cực sẽ mang đến màn ảnh trận chiến cuối cùng khốc liệt nhất mọi thời đại. Biệt đội Avengers và các đồng minh siêu anh hùng của họ phải chấp nhận hy sinh tất cả để có thể chống lại kẻ thù hùng mạnh Thanos trước tham vọng hủy diệt toàn bộ vũ trụ của hắn.', 2, 2018, 4, '02:48:12', 'video/4.mp4', 'https://www.youtube.com/embed/6ZfuNTqbHE8', 'Robert Downey, Chris Hemsworth, Mark Ruffalo, Chris Evans, Scarlett Johansson, Don Cheadle', 1),
(16, 'Gozilla: King of the Monsters', '../admin/uploads/images/gozilla.jpg', 'Michael Dougherty', 'Sự xuất hiện của Godzilla trong quá khứ khiến con người phát hiện ra những sinh vật cổ đại Titan khổng lồ vẫn còn tồn tại trên Trái Đất. Sau trận chiến đánh bại kẻ thù, Godzilla mất tích vào lòng biển. Một ngày kia, Rồng ba đầu Ghidorah trỗi dậy kéo theo sự thức tỉnh của hàng trăm quái vật khổng lồ. Tất cả những gì chúng muốn là tranh giành quyền lực tối cao, thống lĩnh thế giới. Trong trận đại chiến hủy diệt chưa từng có trong lịch sử này, liệu \"Chúa tể của muôn loài\" Godzilla sẽ trở lại và là “đấng cứu thế” của nhân loại trước hiểm họa diệt vong ?', 2, 2019, 4, '02:18:01', 'video/5.mp4', 'https://www.youtube.com/embed/6prr2MIHE0Q', 'Kyle Chandler, Mark Russell, Vera Farmiga, Dr. Emma Russell, Millie Bobby Brown, Madison Russell, Ken Watanabe, Dr. Ishiro Serizawa', 0),
(17, 'Pháp y tâm linh', '../admin/uploads/images/phapytamlinh.jpg', 'Cung Triều Huy', 'Bộ phim xoay quanh Minh Xuyên, một pháp y nức tiếng khắp thành phố Bằng Hải, được mệnh danh là \"Người nghe tiếng xác chết\". Tuy nhiên, không ai biết gì về quá khứ của Minh Xuyên, ngay cả chính anh ta. Khi tham gia phá vụ án pháp y giết người hàng loạt cùng nữ cảnh sát trưởng xinh đẹp tài năng La Bút Tâm, thân phân của anh bị nghi ngờ vì bức hình của anh xuất hiện ở hiện trường gây án.', 3, 2019, 6, '01:12:12', 'video/5.mp4', 'https://www.youtube.com/embed/WI2e8MdDpXs', 'Nhiếp Viễn, Tống Dật, Lô Phương Sinh, Lý Thừa Phong, Trương Đình Phỉ', 3),
(18, 'Những kẻ sống sót', '../admin/uploads/images/songsot.jpg', 'Peter Knights', 'Phim ngắn “Những kẻ sống sót” với thời lượng 21 phút được ghi hình và biên tập lại từ chuyến đi của Phan Anh tại Kenya kéo dài từ ngày 3 – 7/10/2016. Xuyên suốt bộ phim là quá trình Phan Anh ghé thăm hai khu bảo tồn Ol Pejeta và OL Jogi tại Kenya, gặp những nhà bảo tồn, kiểm lâm cũng như tận mắt được nhìn thấy những con tê giác đen, tê giác trắng và ba con tê giác miền Bắc Phi cuối cùng trên Trái Đất nhằm tìm hiểu sâu hơn về cuộc khủng hoảng săn trộm tê giác.', 4, 2018, 7, '00:21:12', 'video/6.mp4', 'https://www.youtube.com/embed/cFFGG9i4SWE', 'Phan Anh', 2),
(19, 'Không đầu hàng', '../admin/uploads/images/khongdauhang.jpg', 'Peter Mimi', 'Alexandria, Ai Cập. năm 1940. Ba thanh niên Ai Cập đến giúp đỡ một phụ nữ Ai Cập đang bị ba lính Anh tấn công. Một trong những người lính, cháu trai của thống đốc quân đội Alexandria của Anh, bị bắt và tống vào tù. Khi thống đốc Anh yêu cầu thả cháu trai của mình ra, nếu không quân đội anh sẽ tấn công. Tướng Youssef al-Masrito, bảo vệ nhà tù của mình và bảo vệ người dân của mình, với một cương quyết: Không đầu hàng!', 1, 2018, 4, '02:12:01', 'video/7.mp4', 'https://www.youtube.com/embed/fXxVM6C4KmY', 'Scott Adkins, Amir Karara, Ghadah Abdulrazeq, Mayan El Sayed', 1),
(20, 'Nàng dâu bị nguyền', '../admin/uploads/images/nangdau.jpg', 'Yoo Young-Seon', 'Nàng Dâu Bị Nguyền là câu chuyện bí ẩn về những cái chết trong dinh thự giàu có bậc nhất Joseon - nơi ở của gia tộc họ Lee. Dường như có một lời nguyền đã ám vào gia tộc này khi những người con trai của gia tộc này đều chết vào đúng đêm tân hôn.', 3, 2016, 5, '01:30:21', 'video/8.mp4', 'https://www.youtube.com/embed/06MBzaNFsI8', 'Seo Young-Hee, Son Na-Eun, Lee Tae-Ri, Park Min-Ji, Choi Hong-Il, Son Sung-Yoon', 4),
(21, 'Quy ẩn', '../admin/uploads/images/quyan.jpg', 'Jérémie Guez', 'A Bluebird in My Heart dựa trên tiểu thuyết The Dishwasher (Người Rửa Chén) của Dannie M Martin. Phim kể về câu chuyện của cựu tù là Daniel (Roland Moller), người làm công việc rửa chén trong nhà hàng và sống trong một nhà nghỉ cũ cố gắng để có một cuộc sống bình lặng. Tại đây, anh kết bạn với chủ nhà nghỉ là một người mẹ đơn thân Laurence (Veerle Baetens) và cô con gái Clara (Lola La Lann).', 1, 2019, 8, '02:30:01', 'video/8.mp4', 'https://www.youtube.com/embed/aJuPOMIYlAc', 'Roland Moller, Lubna Azabal, Veerle Baetens, Lola Le Lann', 1),
(22, 'Tru Tiên', '../admin/uploads/images/trutien.jpg', 'Siu-Tung Ching', 'Trương Tiểu Phàm - mất đi song thân, được Thanh Vân Môn thu nhận. Sau này có được tà vật Ma giáo, khiến Tiên môn không cách nào dung tha. Tiên - Ma phút chốc nhân sinh khó lường. Thế gian rung chuyển, gió mưa thét gào, chính - tà giao tranh như dầu sôi lửa bỏng.', 2, 2019, 6, '02:10:02', 'videos/10.mp4', 'https://www.youtube.com/embed/jCT9rLCndrM', 'Qin Li, Đường Nghệ Hân, Meiqi Meng, Zhan Xiao', 4),
(23, 'Hãy để tuyết rơi', '../admin/uploads/images/tuyetroi.jpg', 'Luke Snellin', 'Bão tuyết ập đến thị trấn nhỏ vào Đêm trước Giáng Sinh lạnh giá, gây nên bao thay đổi đối với tình bạn, tình yêu và tương lai của các cô cậu học sinh cuối cấp.', 5, 2019, 4, '01:12:12', 'video/12.mp4', 'https://www.youtube.com/embed/pitxxQYZcug', 'Isabela Moner, Shameik Moore, Odeya Rush, Liv Hewson, Mitchell Hope, Kiernan Shipka', 9),
(24, 'Gã hề', '../admin/uploads/images/he.jpg', 'Todd Phillips', 'JOKER từ lâu đã là siêu ác nhân huyền thoại của điện ảnh thế giới. Nhưng có bao giờ bạn tự hỏi, Joker đến từ đâu và điều gì đã biến Joker trở thành biểu tượng tội lỗi của thành phố Gotham? JOKER sẽ là cái nhìn độc đáo về tên ác nhân khét tiếng của Vũ trụ DC – một câu chuyện gốc thấm nhuần, nhưng tách biệt rõ ràng với những truyền thuyết quen thuộc xoay quanh nhân vật mang đầy tính biểu tượng này.', 1, 2019, 4, '02:21:12', 'video/25.mp4', 'https://www.youtube.com/embed/K1-11dWJocM', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz, Frances Conroy, Penny Fleck, Thomas Wayne', 10),
(25, 'Natra: Ma đồng giáng thế', '../admin/uploads/images/natra.jpg', 'Yu Yang', 'Từ thuở xa xưa, tinh hoa đất trời hội tụ thành một viên ngọc chứa đựng năng lượng khổng lồ. Nguyên Thủy Thiên Tôn đã phân tách viên ngọc này thành 1 viên Linh Châu và 1 viên Ma Hoàn. Viên Linh Châu sẽ đầu thai thành một anh hùng cứu thế, phò trợ nhà Chu. Trong khi đó, Ma Hoàn sẽ tạo ra một Ma Vương tàn sát thiên hạ. Để ngăn chặn thảm họa, Nguyên Thủy Thiên Tôn đã hạ chú để sau 3 năm Ma Vương sẽ bị Thiên kiếp tiêu diệt. Liệu Na Tra có đủ sức để thay đổi Thiên mệnh?', 2, 2019, 6, '02:31:12', 'video/22.mp4', 'https://www.youtube.com/embed/oJEwLXhPY7Y', 'Yanting Lü, Joseph, Mo Han, Hao Chen, Qi Lü, Jiaming Zhang', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia`
--

CREATE TABLE `quocgia` (
  `id_quocgia` int(11) NOT NULL,
  `tenquocgia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quocgia`
--

INSERT INTO `quocgia` (`id_quocgia`, `tenquocgia`) VALUES
(4, 'Mỹ'),
(5, 'Hàn Quốc'),
(6, 'Trung Quốc'),
(7, 'Việt Nam'),
(8, 'Pháp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `tentheloai` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`) VALUES
(1, 'Hành động'),
(2, 'Viễn tưởng'),
(3, 'Kinh dị'),
(4, 'Phim tài liệu'),
(5, 'Hài hước');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_theloai` (`theloai`),
  ADD KEY `fk_quocgia` (`quocgia`);

--
-- Chỉ mục cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`id_quocgia`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phim`
--
ALTER TABLE `phim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  MODIFY `id_quocgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `fk_quocgia` FOREIGN KEY (`quocgia`) REFERENCES `quocgia` (`id_quocgia`),
  ADD CONSTRAINT `fk_theloai` FOREIGN KEY (`theloai`) REFERENCES `theloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
