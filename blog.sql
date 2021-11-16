-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 11:45 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `slug` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `title`, `content`, `meta_description`, `meta_keywords`, `slug`, `image_url`) VALUES
(3, 'Everything About Pegasus Spyware', '<h4>What is Pegasus?</h4>\r\n<div>\r\n<div>\r\n<p>Pegasus is a spyware developed by the Israeli cyber arms firm NSO Group that can be installed on mobile phones running iOS, Android &amp; Blackberry. Pegasus is capable of reading text messages, tracking calls, collecting passwords, location tracking, accessing the target device\'s microphone and camera, and harvesting information from apps. This is a Trojan horse that can be sent \"flying through the air\" to infect phones.</p>\r\n<h4>How Pegasus Infects:</h4>\r\n<p>Pegasus uses Zero Click Attack. The older version of the spyware(2016-2018) used the SPEAR PHISHING technique to get into a device. Spear Phishing is a phishing technique where you click on one link and it installs the software on your device. But now, it can reach other phones using ZERO-CLICK-ATTACK which is as scary as it sounds. In Zero-Click-Attack, the spyware exploits a vulnerability of one of the apps presented on the phone without any interaction on your side, and then it spreads itself to the other device without the users&rsquo; knowledge.</p>\r\n<h4>&nbsp;</h4>\r\n</div>\r\n<div>\r\n<div>\r\n<h4>TRIDENT Vulnerability in 2016:</h4>\r\n<p>In 2016 a security analysis shows that the malware exploits three zero-day vulnerabilities,&nbsp;<strong>Trident</strong>, in Apple&rsquo;s iOS:</p>\r\n<ol>\r\n<li><strong>CVE-2016-4657</strong>: Memory Corruption in WebKit - A vulnerability in Safari WebKit allows the attacker to compromise the device when the user clicks on a link.</li>\r\n<li><strong>CVE-2016-4655</strong>: Kernel Information Leak - A kernel base mapping vulnerability that leaks information to the attacker that allows him to calculate the kernel&rsquo;s location in memory.</li>\r\n<li><strong>CVE-2016-4656</strong>: Kernel Memory corruption leads to Jailbreak - 32 and 64-bit iOS kernel-level vulnerabilities that allow the attacker to silently jailbreak the device and install surveillance software.</li>\r\n</ol>\r\n<p>These vulnerabilities were present in the versions of iOS up to iOS 9.3.4. Given the severity of Trident, Apple worked extremely quickly to patch these vulnerabilities and has released iOS 9.3.5 to address them.&nbsp;</p>\r\n<h4>Whatsapp Call Vulnerability in 2019:</h4>\r\n<p>In 2019 WhatsApp revealed that NSO&rsquo;s software had been used to send malware to more than 1,400 phones by exploiting a zero-day vulnerability. Simply by placing a WhatsApp call to a target device, malicious Pegasus code could be installed on the phone, even if the target never answered the call.</p>\r\n<p>Now the Security Issue has been fixed by Facebook the parent company of Whatsapp.&nbsp;</p>\r\n<p><a href=\"https://www.facebook.com/security/advisories/cve-2019-3568\">https://www.facebook.com/security/advisories/cve-2019-3568</a></p>\r\n<h4>What does Pegasus do after getting inside your phone?</h4>\r\n<p>Once the spyware gets to the phone it can gain root access easily and pretty much do anything. Like it can look into your photos, videos, call logs, all the information stored in the device. And the scariest part is, it can start your camera and microphone anytime. It can also read your keystrokes. So if you are typing your password, then the spyware can read it too. It hooks into widely used secure messenger applications to copy cleartext data out of them before the user&rsquo;s app can encrypt and send it. From the perspective of the user and the people they&rsquo;re communicating with, their communications are secure, while the administrator of the&nbsp;Pegasus instance has secretly intercepted the clear text of their communication.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://api.codewithharry.com/media/blogFiles/pegasus-spyware-2021/PegaSUS.jpg\" width=\"373\" height=\"311\" /></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<h4>What to do?</h4>\r\n<p>If you are just a normal person, then I think you are safe from it because right now only some high profile people are being targeted. It does not mean that we can take this lightly. The spyware violates several Indian IT Rules and the government is taking strict action against it.&nbsp;</p>\r\n<h4>Where can I download it?</h4>\r\n<p>I have seen people googling \"pegasus apk download\". It does not work like that. You will have to buy one license for it. Pegasus carries a high price tag averaging at over $25,000 per target. And the process is highly complicated for a normal person to buy. So, if you see pegasus.apk on the internet there is a 100% chance that it is fake.&nbsp;</p>\r\n<h4>The Conclusion:</h4>\r\n<p>As of now several thousands of people are infected worldwide by this spyware. How many and which &ldquo;Zero Day Exploits&rdquo; does pegasus use to infect is still unknown to us. Right now all we can say is that if you are not in connection with any high-profile people who have recently been infected then you are probably safe.</p>\r\n</div>\r\n</div>\r\n</div>', '\r\n          \r\n          Pegasus is a spyware developed by the Israeli cyber arms firm NSO Group that can be installed on mobile phones running iOS, Android & Blackberry. Pegasus is capable of reading text messages, tracking calls, collecting passwords, location tracking, accessing the target device\'s microphone and camera, and harvesting information from apps. This is a Trojan horse that can be sent \"flying through the air\" to infect phones. \r\n          \r\n          \r\n          \r\n        \r\n        \r\n        \r\n        \r\n        \r\n        \r\n        ', '\r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n            \r\n  \r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'pegasus', 'data:image/jpeg;base64,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'),
(5, 'Pegasus', '\r\n\r\n  ', '', '', 'pegasus-1', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `category_description` text NOT NULL,
  `category_url` text NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_url`, `image_url`) VALUES
(38, 'Java Tutorial For Beginners', '            java tutorials      ', 'http://localhost/blog/video.php?slug=java-tutorial-for-beginners-1', 'https://api.codewithharry.com/media/videoSeriesTiles/java.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `comment_content` text NOT NULL,
  `comment_post_id` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `username`, `comment_content`, `comment_post_id`, `date`) VALUES
(1, 'Pulkit', 'mbmnmnmnm', '5', '2021-08-09'),
(2, 'Pulkit', 'nbnmnmnbnbmnbn', '5', '2021-08-09'),
(3, 'Pulkit', '', '5', '2021-08-09'),
(4, 'Pulkit', '', '5', '2021-08-09'),
(5, 'Pulkit', 'hhjkhg', '5', '2021-08-09'),
(6, 'Pulkit', 'dfhdhf', '5', '2021-08-09'),
(7, 'Pulkit', 'xcxcxccx', '5', '2021-08-09'),
(8, 'Pulkit', 'dgxdx', '5', '2021-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phoneno` text NOT NULL,
  `email` text NOT NULL,
  `concern` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phoneno`, `email`, `concern`, `date`) VALUES
(5, 'Pulkit Pareek', '+919950193240', 'pulkitpareek18@gmail.com', 'fg', '2021-08-03 14:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `category_name` text NOT NULL,
  `player_url` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `title`, `content`, `category_id`, `slug`, `category_name`, `player_url`, `meta_description`, `meta_keywords`) VALUES
(42, 'Complete Java Cheatsheet', '<p>A paragraph is&nbsp;<strong>a series of related sentences developing a central idea</strong>, called the topic. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</p>', 38, 'java-tutorial-for-beginners-1', 'Java Tutorial For Beginners', 'https://www.youtube.com/embed/3zBhmYSLB70', '\r\n          \r\n          \r\n           java-tutorial-for-beginners-1java-tutorial-for-beginners-1java-tutorial-for-beginners-1java-tutorial-for-beginners-1java-tutorial-for-beginners-1java-tutorial-for-beginners-1\r\n        \r\n        \r\n        ', '\r\n            \r\n  \r\n            \r\n  fghj , rh, ht\r\n\r\n\r\n\r\n'),
(43, 'Complete Java Cheatsheet', '<h3>Introduction to Java + Installing Java JDK and IntelliJ IDEA for Java</h3>\r\n<div>\r\n<div>\r\n<ul>\r\n<li>Java is one of the most popular programming languages because it is used in various tech fields like app development, web development, client-server applications, etc.</li>\r\n<li>Java is an object-oriented programming language developed by Sun Microsystems of the USA in 1991.</li>\r\n<li>It was originally called Oak by James Goslin. He was one of the inventors of Java.</li>\r\n<li>Java = Purely Object-Oriented.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div>\r\n<div>\r\n<div><ins data-ad-status=\"unfilled\" data-adsbygoogle-status=\"done\" data-ad-slot=\"7409118598\" data-ad-client=\"ca-pub-9655830461045889\"><ins id=\"aswift_2_expand\" tabindex=\"0\" title=\"Advertisement\" aria-label=\"Advertisement\"><ins id=\"aswift_2_anchor\"><iframe id=\"aswift_2\" src=\"https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-9655830461045889&amp;output=html&amp;h=200&amp;slotname=7409118598&amp;adk=2968315965&amp;adf=795965725&amp;pi=t.ma~as.7409118598&amp;w=250&amp;lmt=1627862473&amp;psa=1&amp;format=250x200&amp;url=https%3A%2F%2Fwww.codewithharry.com%2Fvideos%2Fjava-tutorials-for-beginners-1&amp;flash=0&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTAuMCIsIng4NiIsIiIsIjkyLjEuMjcuMTA5IixbXSxudWxsLG51bGwsbnVsbF0.&amp;dt=1627883033177&amp;bpp=12&amp;bdt=752154&amp;idt=15&amp;shv=r20210728&amp;mjsv=m202107290101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3Db7e38794431a17b2-226812e514ca0059%3AT%3D1625043893%3ART%3D1625043893%3AS%3DALNI_MbFK5vECRaEgijKrZIJbLT8NynJbQ&amp;prev_fmts=0x0%2C1349x629&amp;nras=2&amp;correlator=1173108145574&amp;frm=20&amp;pv=1&amp;ga_vid=296599400.1625043891&amp;ga_sid=1627882284&amp;ga_hid=713197493&amp;ga_fc=0&amp;u_tz=330&amp;u_his=3&amp;u_java=0&amp;u_h=768&amp;u_w=1366&amp;u_ah=728&amp;u_aw=1366&amp;u_cd=24&amp;u_nplug=2&amp;u_nmime=2&amp;adx=385&amp;ady=881&amp;biw=1349&amp;bih=629&amp;scr_x=0&amp;scr_y=0&amp;eid=20211866&amp;oid=3&amp;pvsid=3027932777644956&amp;pem=180&amp;eae=0&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1366%2C0%2C1366%2C728%2C1366%2C629&amp;vis=1&amp;rsz=%7C%7CpeEbr%7C&amp;abl=CS&amp;pfx=0&amp;fu=0&amp;bc=31&amp;ifi=3&amp;uci=a!3&amp;btvi=1&amp;fsb=1&amp;xpc=smpI5La7PH&amp;p=https%3A//www.codewithharry.com&amp;dtd=63\" name=\"aswift_2\" width=\"250\" height=\"200\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" sandbox=\"allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation\" allowfullscreen=\"allowfullscreen\" data-load-complete=\"true\" data-google-query-id=\"CJqzy_HQkfICFY_e3godljAFZg\" data-google-container-id=\"a!3\" data-mce-fragment=\"1\"></iframe></ins></ins></ins></div>\r\n</div>\r\n<div>\r\n<p>&nbsp;</p>\r\n<h4><strong>How Java Works?</strong></h4>\r\n<ul>\r\n<li>The source code in Java is first compiled into the bytecode.</li>\r\n<li>Then the Java Virtual Machine(JVM) compiles the bytecode to the machine code.</li>\r\n</ul>\r\n<p><img style=\"height: auto;\" src=\"https://api.codewithharry.com/media/videoSeriesFiles/courseFiles/java-tutorials-for-beginners-1/base64.png\" /></p>\r\n<h4>Java Installation:</h4>\r\n<h5>Step 1:&nbsp; Downloading JDK&nbsp;</h5>\r\n<ul>\r\n<li>JDK stands for Java Development Kit. It contains Java Virtual Machine(JVM) and Java Runtime Environment(JRE).</li>\r\n<li><strong>JDK &ndash;&nbsp;</strong>Java Development Kit = Collection of tools used for developing and running java programs.</li>\r\n<li><strong>JRE &ndash;&nbsp;</strong>Java Runtime Environment = Helps in executing programs developed in JAVA.</li>\r\n<li><a title=\"Link for downloading JDK\" href=\"https://www.oracle.com/java/technologies/javase-jdk16-downloads.html\" target=\"_blank\" rel=\"noopener\">Click here</a>, and you will be redirected to the official download page of JDK.&nbsp;</li>\r\n<li>Select your operating system and download the file(executable file in case of Windows).<br />\r\n<h5>Video tutorial for downloading JDK :</h5>\r\n<h5><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video></h5>\r\n</li>\r\n</ul>\r\n<h5>Step 2: Installing JDK</h5>\r\n<ul>\r\n<li>Once the executable file is downloaded successfully, right-click and open the file.</li>\r\n<li>The executable file will start executing.</li>\r\n<li>Keep clicking on the&nbsp;<strong>Next</strong>&nbsp;button to install the JDK in default settings.<br />\r\n<h5>Video tutorial for installing JDK :<br /><br /><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video></h5>\r\n</li>\r\n</ul>\r\n<h5>Step 3: Downloading IntelliJ IDEA :</h5>\r\n<ul>\r\n<li>We need an Integrated Development Environment(IDE) to write and debug our code easily.</li>\r\n<li>IntelliJ IDEA is the best-suited IDE for writing Java code.</li>\r\n<li><a title=\"IntelliJ IDEA download link\" href=\"https://www.jetbrains.com/idea/download/#section=windows\" target=\"_blank\" rel=\"noopener\">Click here</a>, and you will be redirected to the official download page of IntelliJ IDEA.</li>\r\n<li>Download the&nbsp;<strong>Community Version</strong>&nbsp;of the IntelliJ IDEA as it is free to use.<br />\r\n<h5>Video tutorial for downloading IntelliJ IDEA:<br /><br /><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video></h5>\r\n</li>\r\n</ul>\r\n<h5>Step 4: Installing IntelliJ IDEA :</h5>\r\n<ul>\r\n<li>Once the download completes, open the .exe file, and the installation process will begin.</li>\r\n<li>Click on the \"Next\" button to install the IntelliJ IDEA in the default location.</li>\r\n<li>Do not forget to check&nbsp;<strong>\"Add launchers dir to the PATH,\"&nbsp;</strong>as shown in the below image.&nbsp;<br /><br /><img style=\"height: auto;\" src=\"https://api.codewithharry.com/media/videoSeriesFiles/courseFiles/java-tutorials-for-beginners-1/Idea_installation.png\" alt=\"Screenshot for adding java to path\" width=\"850\" height=\"691\" /><br /><br /></li>\r\n<li>After this, click on the \"Next\" button and then click on the \"Install\" button.<br />\r\n<h5>Video tutorial for installing IntelliJ IDEA:</h5>\r\n<h5><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video><br /><br /></h5>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Handwritten Notes:</strong>&nbsp;<a href=\"https://api.codewithharry.com/media/videoSeriesFiles/courseFiles/java-tutorials-for-beginners-1/IntroToJava.pdf\" target=\"_blank\" rel=\"noopener\">Click To Download</a></p>\r\n<p><strong>Ultimate Java Cheatsheet:</strong>&nbsp;<a href=\"https://api.codewithharry.com/media/videoSeriesFiles/courseFiles/java-tutorials-for-beginners-1/UltimateJavaCheatSheet.pdf\" target=\"_blank\" rel=\"noopener\">Click To Download</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>', 38, 'a', 'Java Tutorial For Beginners', 'https://www.youtube.com/embed/XUZmiNYnQEg', '\r\n          \r\n          dfsv df\r\n        \r\n        ', '\r\n            \r\n  \r\n            \r\n  as,sd\r\n\r\n'),
(44, 'ty', '<h3>Introduction to Java + Installing Java JDK and IntelliJ IDEA for Java</h3>\r\n<div>\r\n<div>\r\n<ul>\r\n<li>Java is one of the most popular programming languages because it is used in various tech fields like app development, web development, client-server applications, etc.</li>\r\n<li>Java is an object-oriented programming language developed by Sun Microsystems of the USA in 1991.</li>\r\n<li>It was originally called Oak by James Goslin. He was one of the inventors of Java.</li>\r\n<li>Java = Purely Object-Oriented.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div>\r\n<div>\r\n<div><ins data-ad-status=\"unfilled\" data-adsbygoogle-status=\"done\" data-ad-slot=\"7409118598\" data-ad-client=\"ca-pub-9655830461045889\"><ins id=\"aswift_2_expand\" tabindex=\"0\" title=\"Advertisement\" aria-label=\"Advertisement\"><ins id=\"aswift_2_anchor\"><iframe id=\"aswift_2\" src=\"https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-9655830461045889&amp;output=html&amp;h=200&amp;slotname=7409118598&amp;adk=2968315965&amp;adf=795965725&amp;pi=t.ma~as.7409118598&amp;w=250&amp;lmt=1627862473&amp;psa=1&amp;format=250x200&amp;url=https%3A%2F%2Fwww.codewithharry.com%2Fvideos%2Fjava-tutorials-for-beginners-1&amp;flash=0&amp;wgl=1&amp;uach=WyJXaW5kb3dzIiwiMTAuMCIsIng4NiIsIiIsIjkyLjEuMjcuMTA5IixbXSxudWxsLG51bGwsbnVsbF0.&amp;dt=1627883033177&amp;bpp=12&amp;bdt=752154&amp;idt=15&amp;shv=r20210728&amp;mjsv=m202107290101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie=ID%3Db7e38794431a17b2-226812e514ca0059%3AT%3D1625043893%3ART%3D1625043893%3AS%3DALNI_MbFK5vECRaEgijKrZIJbLT8NynJbQ&amp;prev_fmts=0x0%2C1349x629&amp;nras=2&amp;correlator=1173108145574&amp;frm=20&amp;pv=1&amp;ga_vid=296599400.1625043891&amp;ga_sid=1627882284&amp;ga_hid=713197493&amp;ga_fc=0&amp;u_tz=330&amp;u_his=3&amp;u_java=0&amp;u_h=768&amp;u_w=1366&amp;u_ah=728&amp;u_aw=1366&amp;u_cd=24&amp;u_nplug=2&amp;u_nmime=2&amp;adx=385&amp;ady=881&amp;biw=1349&amp;bih=629&amp;scr_x=0&amp;scr_y=0&amp;eid=20211866&amp;oid=3&amp;pvsid=3027932777644956&amp;pem=180&amp;eae=0&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C1366%2C0%2C1366%2C728%2C1366%2C629&amp;vis=1&amp;rsz=%7C%7CpeEbr%7C&amp;abl=CS&amp;pfx=0&amp;fu=0&amp;bc=31&amp;ifi=3&amp;uci=a!3&amp;btvi=1&amp;fsb=1&amp;xpc=smpI5La7PH&amp;p=https%3A//www.codewithharry.com&amp;dtd=63\" name=\"aswift_2\" width=\"250\" height=\"200\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"no\" sandbox=\"allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation\" allowfullscreen=\"allowfullscreen\" data-load-complete=\"true\" data-google-query-id=\"CJqzy_HQkfICFY_e3godljAFZg\" data-google-container-id=\"a!3\" data-mce-fragment=\"1\"></iframe></ins></ins></ins></div>\r\n</div>\r\n<div>\r\n<p>&nbsp;</p>\r\n<h4><strong>How Java Works?</strong></h4>\r\n<ul>\r\n<li>The source code in Java is first compiled into the bytecode.</li>\r\n<li>Then the Java Virtual Machine(JVM) compiles the bytecode to the machine code.</li>\r\n</ul>\r\n<p><img style=\"height: auto;\" src=\"https://api.codewithharry.com/media/videoSeriesFiles/courseFiles/java-tutorials-for-beginners-1/base64.png\" /></p>\r\n<h4>Java Installation:</h4>\r\n<h5>Step 1:&nbsp; Downloading JDK&nbsp;</h5>\r\n<ul>\r\n<li>JDK stands for Java Development Kit. It contains Java Virtual Machine(JVM) and Java Runtime Environment(JRE).</li>\r\n<li><strong>JDK &ndash;&nbsp;</strong>Java Development Kit = Collection of tools used for developing and running java programs.</li>\r\n<li><strong>JRE &ndash;&nbsp;</strong>Java Runtime Environment = Helps in executing programs developed in JAVA.</li>\r\n<li><a title=\"Link for downloading JDK\" href=\"https://www.oracle.com/java/technologies/javase-jdk16-downloads.html\" target=\"_blank\" rel=\"noopener\">Click here</a>, and you will be redirected to the official download page of JDK.&nbsp;</li>\r\n<li>Select your operating system and download the file(executable file in case of Windows).<br />\r\n<h5>Video tutorial for downloading JDK :</h5>\r\n<h5><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video></h5>\r\n</li>\r\n</ul>\r\n<h5>Step 2: Installing JDK</h5>\r\n<ul>\r\n<li>Once the executable file is downloaded successfully, right-click and open the file.</li>\r\n<li>The executable file will start executing.</li>\r\n<li>Keep clicking on the&nbsp;<strong>Next</strong>&nbsp;button to install the JDK in default settings.<br />\r\n<h5>Video tutorial for installing JDK :<br /><br /><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video></h5>\r\n</li>\r\n</ul>\r\n<h5>Step 3: Downloading IntelliJ IDEA :</h5>\r\n<ul>\r\n<li>We need an Integrated Development Environment(IDE) to write and debug our code easily.</li>\r\n<li>IntelliJ IDEA is the best-suited IDE for writing Java code.</li>\r\n<li><a title=\"IntelliJ IDEA download link\" href=\"https://www.jetbrains.com/idea/download/#section=windows\" target=\"_blank\" rel=\"noopener\">Click here</a>, and you will be redirected to the official download page of IntelliJ IDEA.</li>\r\n<li>Download the&nbsp;<strong>Community Version</strong>&nbsp;of the IntelliJ IDEA as it is free to use.<br />\r\n<h5>Video tutorial for downloading IntelliJ IDEA:<br /><br /><video controls=\"controls\" width=\"850\" height=\"425\" data-mce-fragment=\"1\"></video></h5>\r\n</li>\r\n</ul>\r\n<h5>Step 4: Installing IntelliJ IDEA :</h5>\r\n<ul>\r\n<li>Once the download completes, open the .exe file, and the installation process will begin.</li>\r\n<li>Click on the \"Next\" button to install the IntelliJ IDEA in the default location.</li>\r\n<li>Do not forget to check&nbsp;<strong>\"Add launchers dir to the PATH,\"&nbsp;</strong>as shown in the below image.&nbsp;<br /><br /></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', 38, 'n', 'Java Tutorial For Beginners', 'https://www.youtube.com/embed/XUZmiNYnQEg', '', ''),
(45, 'SKC SHAYARI', '<p>About Me â–º My name is Nischay Malhan. I\'m from Delhi and I\'m an engineering student. Now I am pursuing youtube Full Time. I make family friendly clean comedy Gaming videos on this channel for everyone to enjoy with their family. You don\'t need earphones to watch my videosðŸ˜‚ Thanks For ReadingðŸ˜˜</p>', 38, 'tu', 'Java Tutorial For Beginners', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

CREATE TABLE `reply_comments` (
  `id` int(11) NOT NULL,
  `replied_comment_id` int(11) NOT NULL,
  `reply_comment_content` text NOT NULL,
  `username` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `replied_comment_id`, `reply_comment_content`, `username`, `date`) VALUES
(1, 1, 'nbmnbnmnmbnmnnbmbbnmm', 'Pulkit', '2021-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `max_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`max_post`) VALUES
(11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1100) NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(1, 'pp', '$2y$10$QFSKHGZDD9mceymVlbr8kutyULPys5A0cxoylXJ4FjY2aAIS6luda', '2021-08-06 12:41:31'),
(2, 'Pulkit', '$2y$10$iigxkWea.COxWNc/uO5AXuKRlDOVTBvYF4QF6EfewWsGjww2Gb/b6', '2021-08-06 13:28:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`) USING HASH;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`) USING HASH;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `reply_comments`
--
ALTER TABLE `reply_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`max_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `reply_comments`
--
ALTER TABLE `reply_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
