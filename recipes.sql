-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 05:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_27262246_recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE `directions` (
  `dish_id` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `directions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`dish_id`, `step`, `directions`) VALUES
(1, 1, 'Combine chicken pieces, salt, coriander powder, turmeric powder, 1 tsp red chilli powder, 1 tbsp crushed peppercorns and egg in a bowl and mix well.'),
(1, 2, 'Finely chop 5-6 curry leaves and add along with lemon juice and mix well.'),
(1, 3, 'Add ginger-garlic paste and rice flour and mix well.'),
(1, 4, 'Heat sufficient oil in a kadai. Deep-fry chicken pieces till golden and crisp. Drain on absorbent paper.'),
(1, 5, 'Heat coconut oil in anon-stick pan. Add dried coconut slices and sauté till well browned and crisp. Add mustard seeds and let them splutter.'),
(1, 6, 'Add remaining curry leaves, 2 tsps crushed peppercorns, little water and mix well.'),
(1, 7, 'Add salt, remaining red chilli powder and cook for a minute.'),
(1, 8, 'Add fried chicken and toss to mix. Let it get heated through.'),
(1, 9, 'Serve hot.'),
(2, 1, 'Keep paneer cubes in a bowl, add salt, ginger-garlic paste, refined flour, 1 tsp tomato chilli sauce and mix gently. Roughly chop spring onions.'),
(2, 2, 'Heat 2 tbsps oil in a non stick wok. Heat sufficient oil in a kadai. Cut red chillies into small pieces, remove seeds and add to the wok. Add spring onions and saute.'),
(2, 3, 'Add a few cubes of paneer at a time to the hot oil in the kadai and deep fry on high heat till golden. Add capsicums to the wok and mix well. Add salt cookfor some time.'),
(2, 4, 'Add 1 tbsp tomato chilli sauce, mix well and cook for 2 minutes. Switch off the heat.Drain paneer cubes and add to the wok and mix well.'),
(2, 5, 'Serve hot.'),
(3, 1, 'To make the gravy, heat oil in a non-stick pan. Add cinnamon, green cardamoms, black peppercorns and cumin seeds and sauté till fragrant.'),
(3, 2, 'Add red pumpkin, bottle gourd, red chilli powder, coriander powder, turmeric powder, cumin powder and garam masala powder and mix well.'),
(3, 3, 'Add bhuna masala and mix well. Add coriander and mint leaves and mix. Transfer the mixture into a mixer jar and let it cool slightly. Add a little water and grind into a purée. Transfer the puree into a bowl and set aside.'),
(3, 4, 'To make the koftas, mix together mixed vegetables, potatoes, breadcrumbs, green chillies, ginger, red chilli powder and salt.'),
(3, 5, 'Heat sufficient oil in a kadai. Divide the mixture into equal portions and shape them into balls. Slide these into hot oil and deep fry till golden and crisp. Drain on absorbent paper.'),
(3, 6, 'Heat butter in another non-stick pan. Add tomato purée and cook for 2 minutes. Strain the ground purée and add to this pan. Add fresh cream and mix well. Allow the gravy to come to a boil. Simmer for 1-2 minutes.'),
(3, 7, 'Transfer the gravy into a serving dish, place koftas over it and serve hot.'),
(4, 1, 'Cut chicken in one inch pieces. Boil rice and set aside. Heat oil in a non-stick pan, add cinnamon, bay leaves, cloves, cumin seeds, green cardamoms and sauté for half a minute.'),
(4, 2, 'Add sliced onions and sauté. Add slit green chillies and chicken cubes and continue to sauté. Add turmeric powder and mix. Add tomatoes and salt and mix. Add ginger-garlic paste, red chilli powder and yogurt. Mix well.'),
(4, 3, 'Add half the fried brown onions. Add the boiled rice on top. Sprinkle garam masala powder, ginger strips, mint leaves and coriander leaves. Sprinkle milk, rose water and remaining browned onions.'),
(4, 4, 'Cover and cook on low heat for about ten minutes. Garnish with the egg slices and serve hot.'),
(5, 1, 'Take yogurt in a bowl, add strawberry compote and condensed milk and mix well.'),
(5, 2, 'Fill the mixture equally into paper cups and insert popsicle sticks in the middle. Freeze for 7-8 hours.'),
(5, 3, 'Tear off the sides of the paper cups gently and remove the popsicles. Serve immediately.'),
(6, 1, 'To make custard, break 2 eggs, separate the egg yolks and put them in a mixing bowl. Keep the egg whites in another bowl. Break the remaining egg and add to the egg yolks.'),
(6, 2, 'Add 2½ tbsps castor sugar, cornflour and refined flour to the egg yolk mixture and whisk well.'),
(6, 3, 'Heat milk and fresh cream in a deep non-stick pan and mix well. Add 2 ½ tbsps. Castor sugar and vanilla pod and mix well. Let the mixture come to a gentle boil.'),
(6, 4, 'Add ¼ cup of the hot mixture to the egg mixture and whisk well. Add the remaining milk mixture to the egg yolk mixture, whisk well.'),
(6, 5, 'Transfer the prepared mixture back into the pan and cook, whisking continuously, till the mixture thickens. Transfer into a bowl, cool down to room temperature and refrigerate till chilled.'),
(6, 6, 'For each portion, place a few sponge cubes in serving glasses. Drizzle a little sugar syrup and lightly press the sponge cubes.'),
(6, 7, 'Add a few mango cubes, a few blueberries and pour some custard over the fruits.'),
(6, 8, 'Arrange a few pieces of jelly cubes over the custard. Take whipped cream in a piping bag and pipe whipped cream on top.'),
(6, 9, 'Garnish with a few mango cubes, blueberries, kiwi slices and fresh cherries and serve.'),
(7, 1, 'Preheat oven to 180° C.'),
(7, 2, 'Add granulated sugar to orange juice and mix till it melts. Set aside.'),
(7, 3, 'Sift together flour, cocoa powder and baking powder in a bowl.'),
(7, 4, 'Cream together butter and castor sugar with a hand blender till light and fluffy.'),
(7, 5, 'Add eggs and milk and beat well till smooth. Add flour mixture and fold well. Add chocolate and mix well. Add orange rind and mix well.'),
(7, 6, 'Pour the mixture into a silicon mould, place it in the preheated oven and bake for 30-35 minutes. Remove from heat and set aside till just warm.'),
(7, 7, 'Demould, pour the sweetened orange juice and let the loaf absorb the juice. Slice and serve'),
(8, 1, 'Preheat oven to 180° C.'),
(8, 2, 'Heat cream in a small deep non-stick pan.'),
(8, 3, 'Scrape out vanilla pod, add to pan along with the pod, whisk and bring mixture to boil.'),
(8, 4, 'Dip in tea bags, whisk and cook till the mixture thickens.'),
(8, 5, 'Take egg yolks and castor sugar in a bowl and whisk till sugar melts. Strain the vanilla-cream mixture into the bowl gradually and whisk well.'),
(8, 6, 'Place individual ramekin moulds on a baking tray and fill them with this cream mixture. Pour some water into the baking tray and cover the moulds with aluminium foil.'),
(8, 7, 'Place the baking tray in the preheated oven and bake for 20-25 minutes. Remove from oven and cool. Refrigerate for 1 hour.'),
(8, 8, 'Put a layer of brown sugar on top and brulee using a blow torch.'),
(8, 9, 'Serve immediately.'),
(9, 1, 'Pour strawberry syrup into a blender jar, add torn mint leaves, salt, lemon juice, ice cubes and ½ cup soda and blend well.'),
(9, 2, 'Pour into individual glasses and top with remaining soda and garnish with a mint sprig.'),
(9, 3, 'Serve chilled.'),
(10, 1, 'Cut carrot into small cubes. Slice ginger. Chop pineapple slices. Keeping aside a few pieces for garnish, put the rest in a blender jar.'),
(10, 2, 'Add carrot and ginger, add pineapple juice and blend till smooth. Add ice and honey and blend some more.'),
(10, 3, 'Pour into stemmed glasses. Put a thin slice of lemon on the rim of the glasses along with a pineapple piece. Place a spring of fresh mint over them and serve immediately'),
(11, 1, 'Process pineapple juice, coconut milk, coconut , vanilla ice cream and ice in a blender till smooth. Pour into Collins glasses.'),
(11, 2, 'Serve immediately decorated with pineapple chunks and cherries.'),
(12, 1, 'Halve lemons, remove seeds and cut into small pieces. Divide them equally into 4 glasses.'),
(12, 2, 'Put 1½ tbsps sugar syrup in each glass and crush the lemon pieces with a muddler.'),
(12, 3, 'Add ice cubes. Add 1½ tbsps blue curacao in each glass. Fill them up with drinking soda, stir and serve instantly with a stirrer and straw.'),
(13, 1, 'Marinate chicken breasts with salt, crushed garlic, 1 tsp olive oil, 1 tsp Balsamic vinegar, ½ tsp crushed peppercorns, rosemary and thyme. Mix and set aside for 10-15 minutes.'),
(13, 2, 'Combine mushrooms, red pepper, capsicum, yellow pepper, ½ tsp crushed peppercorns, salt, chopped garlic, remaining Balsamic vinegar, remaining olive oil and remaining crushed peppercorns in a bowl. Mix well and set aside to marinate for 5-10 minutes.'),
(13, 3, 'Heat 1 tsp oil in a non-stick grill pan. Place marinated chicken on it and grill till evenly done from both sides and chicken is cooked.'),
(13, 4, 'Heat remaining oil in another non-stick pan. Add marinated vegetables and sauté well.'),
(13, 5, 'To make dressing, combine Balsamic vinegar, olive oil, salt and crushed peppercorns in a bowl and mix well into a homogenous mixture.'),
(13, 6, 'Transfer sautéed vegetables in a bowl. Add 3-4 torn basil leaves and toss well. Cool to room temperature. Add torn Iceberg lettuce leaves, Lollorosso leaves and arugula leaves and mix well. Add some dressing and toss well.'),
(13, 7, 'Place the vegetable salad on a serving plate. Cut the grilled chicken into thick slices and place along the salad. Drizzle remaining dressing on top, garnish with some basil leaves and serve immediately.'),
(14, 1, 'Dry roast porridge oats. Chop apricots and figs. Slice the almonds. Transfer the roasted oats in to a bowl. Add almonds, black currants, cornflakes, apricots and mix.'),
(14, 2, 'Store in an airtight container to use when required. You can also add dried pineapple, banana etc. While serving take a little of the mixture into a bowl. Add figs. You can now add fresh fruits like strawberries if you wish.'),
(14, 3, 'If you like it sweet, add honey. Add cold milk and serve. You can also add hot milk if you prefer it that way. You can also serve muesli with yogurt. For this take some muesli in a bowl. Add figs, strawberries, honey and yogurt.'),
(14, 4, 'Mix and let it stand for about five to ten minutes before serving.'),
(15, 1, 'Preheat the oven to 160°C.'),
(15, 2, 'Halve the pavs. Place one half in each ramekin. Tear the spinach leaves and place over the pavs.'),
(15, 3, 'Cook the bacon rashers in a grill pan and then cut them into small pieces. Place these bacon pieces over the spinach. Drizzle two tablespoons cream over the ingredients in each ramekin and sprinkle salt.'),
(15, 4, 'Break one egg into each ramekin. Place the ramekins in the preheated oven and bake for fifteen minutes.'),
(15, 5, 'Serve hot.'),
(16, 1, 'Drain and coarsely grind chickpeas with little water. Transfer into a bowl.'),
(16, 2, 'Add spring onion bulbs, spring onion greens, parsley, coriander leaves, breadcrumbs, garlic, red chilli powder, cumin powder, crushed peppercorns and salt and mix well.'),
(16, 3, 'Add baking soda and lemon juice and mix well. Shape the mixture into even sized small tikkis and arrange them on a greased baking tray.'),
(16, 4, 'Brush them with a little oil and bake them in the oven at 180° C for 25 minutes.'),
(16, 5, 'Serve hot.');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uploded_by` varchar(255) NOT NULL,
  `prep` varchar(255) NOT NULL,
  `cook` varchar(255) NOT NULL,
  `ready_in` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `serve` int(10) NOT NULL,
  `level` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `nutritions` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `uploded_by`, `prep`, `cook`, `ready_in`, `category`, `serve`, `level`, `discription`, `nutritions`, `image`) VALUES
(1, 'Pepper Chicken', 'Editors choice', '16-20 minutes', '26-30 minutes', '50 minutes', 'Main-Course', 4, 'Moderate', 'Pepper chicken is a delicious, aromatic, hot and spicy dish which we can serve with rice or chapati. This great to enjoy during monsoon and winter. It is also easy to make.', 'Calories: 997 Kcal Carbohydrates: 27.4 gm Protein: 75.8 gm ', 'uploads/Editors choice_pepper chicken.jpg'),
(2, 'Chilli Paneer', 'karishma', '11-15 minutes', '16-20 minutes', '35 minutes', 'Main-Course', 4, 'Moderate', 'Chilli Paneer is a popular Indo-Chinese dish where cubes of fried crispy paneer are tossed in a spicy sauce made with soy sauce, vinegar, chili sauce!', 'Calories : 1517 Kcal Carbohydrates : 31.8 gm Protein : 59.2 gm Fat : 128.3 gm Other : Calcium- 723.9mg ', 'uploads/karishma_paneer.jpg'),
(3, 'Veg Kofta', 'Editors Choice', '26-30 minutes', '26-30 minutes', '60 minutes', 'Main-Course', 4, 'Moderate', 'The mix vegetables are not cooked but are minced in a food processor. To these minced veggies, processed cheese, herbs, spices and gram flour are added. The mixture is then shaped into balls and deep fried. Making any kofta gravy takes time. ', 'Calories : 1499 Kcal Carbohydrates : 126.2 gm Protein : 19.9 gm Fat : 101.1 gm Other : 23.1 gm ', 'uploads/Editors choice_kofta.jpg'),
(4, 'Chicken Biryani', 'Editors Choice', '21-25 minutes', '16-20 minutes', '60 minutes', 'Main-Course', 4, 'Moderate', 'A Rich and Flavorful Layered Indian Dish A world-renowned Indian dish, biryani takes time and practice to make but is worth every bit of the effort. Long-grained rice (like basmati) flavored with fragrant spices such as saffron and layered with lamb, chicken, fish, or vegetables and a thick gravy.', 'Calories : 2997 Kcal Carbohydrates : 312.8 gm Protein : 224.9 gm Fat : 94 gm Other : 0  ', 'uploads/Editors choice_chicken biryani.jpg'),
(5, 'Strawberry Yogurt Ice-Cream', 'chinmay', '7-8 hour', '0-5 minutes', '8 hours', 'Dessert', 4, 'Easy', 'Strawberries + Greek Yogurt is kind of perfection, peeps. And, when we say perfection, what we really mean to say is it\'s easy, creamy, strawberry, sweet, icy, coolness. All the things you want in your frozen ice cream treat…plus it\'s healthy!', '72%17gCarbs. 19%2gFat. 9%2gProtein.', 'uploads/chinmay_icecream.jpg'),
(6, 'Fruit Triffle', 'Editors Choice', '2-3 hours', '11-15 minutes', '3-3.30 hour', 'Dessert', 4, 'Easy', 'Made with fruit, a thin layer of sponge fingers commonly soaked in sherry or another fortified wine, and custard, the contents of a trifle are highly variable; many varieties exist, some forgoing fruit entirely and instead using other ingredients, such as chocolate, coffee or vanilla.', 'Calories: 173.6 Saturated Fat: 0.1 g Total Fat: 0.8 g Polyunsaturated Fat: 0.3 g', 'uploads/Editors choice_triffle.jpg'),
(7, 'Chocolate Orange Loaf', 'Editors Choice', '31-40 minutes', '40 minutes', '80 mins', 'Dessert', 4, 'Easy', 'Fusion cuisine is one that combines elements of different culinary traditions. Cuisines of this type are not categorized according to any one particular cuisine style and have played a part in a number of innovations. Fusion food is a general term for the combination of various forms of cookery and comes in several forms.  ', '47%40gCarbs 47%18gFat 6%5gProtein', 'uploads/Editors choice_Chocolate-Orange-Loaf.jpg'),
(8, 'Vanilla Chai Creme Brulee', 'karishma', '1.30-2 hours', '31-40 minutes', '2-3 hours', 'Dessert', 4, 'Easy', 'British cuisine has always been a multicultural - a pot pourri of eclectic styles.  However Britain\'s culinary expertise is not new! In the past British cooking was amongst the best in the world.  Traditional British cuisine is substantial, yet simple and wholesome. So here we have a mix of Indian and British Cuisine for you', '26% 26g Carbs  71% 32g Fat 3% 3g Protein', 'uploads/karishma_Vanilla-Chai-Creme-Brulee.jpg'),
(9, 'Strawberry Soda', 'Editors Choice', '0-5 minutes', '11-15 minutes', '20 minutes', 'Beverages', 2, 'Easy', 'It\'s so easy to make homemade strawberry syrup to flavor iced tea, lemonade, or make into your own strawberry soda.', 'Calories: 66 Carbohydrates: 10 Fat: 2 grams Protein: 0.8 grams Sodium: 16 mg Fiber: 1 gram', 'uploads/Editors choice_soda.jpg'),
(10, 'Power Packed Juice', 'Editors Choice', '11-15 minutes', '0-5 minutes', '20 minutes', 'Beverages', 4, 'Easy', 'A very healthy and tasty juice to start up the day that will boost you and keep you energized all day', '270 calories 45 g carbohydrates 6 g fiber 14 grams protein 5 mg cholesterol 15% DV for calcium 30% DV for iron', 'uploads/Editors choice_power juice.jpg'),
(11, 'Virgin Pina Colada', 'karishma', '16-20 minutes', '0-5 minutes', '25 minutes', 'Beverages', 4, 'Moderate', 'A Spanish phrase meaning strained pineapple, used to mean a mixed drink made with rum, pineapple juice, and coconut cream. This one though is a non-alcoholic one, but it is sure to refresh you up!!', 'Calories : 1468 Kcal Carbohydrates : 135.6 gm Protein : 22.2 gm Fat : 94.9 gm Other : Niacin- 2.3mg ', 'uploads/karishma_pinacolada.jpg'),
(12, 'Blue Curacao Lemonade', 'Editors Choice', '11-15 minutes', '0-5 minutes', '20 minutes', 'Beverages', 4, 'Easy', 'Blue Curaçao is blue colored, slightly bitter orange-flavored liqueur used in popular blue cocktails like the Blue Hawaiian, Blue Bird and many other delicious cocktails.It is an instant refreshing summer drink that is sure to lighten your mood up.', 'Calories : 717 Kcal Carbohydrates : 176.1 gm Protein : 1 gm Fat : 0.9 gm ', 'uploads/Editors choice_lemonade.jpg'),
(13, 'Quick Healthy Chicken Salad', 'Editors Choice', '16-20 minutes', '16-20 minutes', '40 minutes', 'Healthy', 4, 'Easy', 'This healthy chicken salad recipe is fast to make (even faster if you use leftover chicken!) and is a great lunch, dinner, or snack. Pack in container for a fast on-the-go meal.', 'Calories : 983 kcal Kcal Carbohydrates : 10.2 gm gm Protein : 65.7 gm gm Fat : 72.7 gm gm', 'uploads/Editors choice_Quick_Healthy_ChickenSalad.jpg'),
(14, 'Basic Muesli', 'karishma', '16-20 minutes', '0-5 minutes', '25 minutes', 'Healthy', 4, 'Easy ', 'Most popular breakfast item – it has oats, cornflakes and dried fruits making it nutritious too.Cool, hearty, and nourishing – with this easy formula, you can make your own muesli exactly how you like it', 'Calories : 1684 Kcal Carbohydrates : 284.1 gm Protein : 54.1 gm Fat : 36.8 gm', 'uploads/karishma_Basic_Muesli.jpg'),
(15, 'Baked Egg And Bacon Spinach', 'Editors Choice', '6-10 minutes', '16-20 minutes', '30 minutes', 'Healthy', 4, 'Moderate', 'Basic scrambled eggs are made even healthier with the addition of nutrient-packed spinach. The leafy green is low in fat and even lower in cholesterol, making it a great supplement to your scrambled eggs.Do try this power pack healthy recipe!', 'Calories : 904 Kcal Carbohydrates : 40.2 gm Protein : 49.4 gm Fat : 60.6 gm Other : Vitamin B12- 3.6mcg', 'uploads/Editors choice_Spinach-and-Bacon-Baked-Eggs.jpg'),
(16, 'Baked Falafel', 'Editors Choice', '21-25 minutes', '26-30 mminutes', '60 minutes', 'Healthy', 4, 'Moderate', 'Falafels is a middle-Eastern cuisine and extremely popular.These falafels are golden brown and crispy on the outside. The insides are tender, delicious, and full of fresh herbs. They\'re baked instead of fried, so they contain significantly less fat than fried falafel.', 'Calories : 1265 Kcal Carbohydrates : 212 gm Protein : 48.6 gm Fat : 24 gm Other : Iron: 17', 'uploads/Editors choice_Falafel-close-up.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `dish_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `ingredients` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`dish_id`, `rank`, `ingredients`) VALUES
(1, 1, 'Crushed Black Peppercorns 1 teaspoons'),
(1, 2, 'Boneless Chicken breast cut into dices 2'),
(1, 3, 'Salt to taste'),
(1, 4, 'Coriander powder 1 teaspoon'),
(1, 5, 'Turmeric powder 1/2 teaspoon'),
(1, 6, 'Red chilli powder 2 teaspoons'),
(1, 7, 'Egg 1'),
(1, 8, 'Curry leaves 16-18'),
(1, 9, 'Ginger-garlic paste 1 tablespoon'),
(1, 10, 'Rice flour 3 tablespoons'),
(1, 11, 'Oil for deep-frying'),
(1, 12, 'Coconut oil 1 tablespoon'),
(1, 13, 'dried coconut slices 12-15'),
(1, 14, 'Mustard seeds 1 teaspoon'),
(2, 1, 'Dried Red Chillies 3'),
(2, 2, 'Cottage Cheese cut into 1/2 inch pieces 400 grams'),
(2, 3, 'Tomato chilli sauce 1 teaspoon + 1 tablespoons'),
(2, 4, 'Ginger-garlic paste 1 tablespoon'),
(2, 5, 'Refined flour (maida) 2 tablespoons'),
(2, 6, 'Spring onions 5-6'),
(2, 7, 'Oil 2 tablespoons'),
(2, 8, 'Red capsicum chopped 1/2 cup'),
(2, 9, 'Green capsicum chopped 1/2 cup'),
(2, 10, 'Yellow capsicum chopped 1/2 cup'),
(2, 11, 'Salt to taste'),
(3, 1, 'Mixed vegetables (French beans, carrots, peas) finely chopped 2 cups'),
(3, 2, 'Tomato purée finely chopped and blanched 2 cups'),
(3, 3, 'Potatoes boiled, peeled and mashed 2 medium'),
(3, 4, 'Fresh breadcrumbs 1/2 cup'),
(3, 5, 'Green chillies finely chopped 2-3'),
(3, 6, 'Ginger finely chopped 1 tablespoon'),
(3, 7, 'Red chilli powder 1/2 teaspoon'),
(3, 8, 'Salt to taste'),
(3, 9, 'Oil for deep-frying'),
(3, 10, 'For gravy'),
(3, 11, 'Oil 2 tablespoons'),
(3, 12, 'Cinnamon stick 1 inch'),
(3, 13, 'Green cardamoms 5-6'),
(3, 14, 'Black peppercorns 1 teaspoon'),
(3, 15, 'Cumin seeds 1 teaspoon'),
(3, 16, 'Red pumpkin (kaddu) cut into cubes and boiled 100 grams'),
(3, 17, 'Bottle gourd (lauki) cut into cubes and boiled 100 grams'),
(3, 18, 'Red chilli powder 1 teaspoon'),
(3, 19, 'Coriander powder 1 tablespoon'),
(3, 20, 'Turmeric powder a pinch'),
(3, 21, 'Cumin powder 1/4 teaspoon'),
(3, 22, 'Garam masala powder 1/2 teaspoon'),
(3, 23, 'Bhuna masala 130 grams'),
(3, 24, 'Fresh coriander leaves roughly chopped 1/2 cup'),
(3, 25, 'Fresh mint leaves roughly chopped 1/2 cup'),
(3, 26, 'Butter 1 tablespoon'),
(3, 27, 'Tomato purée 1/2 cup'),
(3, 28, 'Fresh cream 1/2 cup'),
(4, 1, 'Boneless chicken 600 grams'),
(4, 2, 'Basmati rice 1 1/2 cups'),
(4, 3, 'Oil 3 tablespoons'),
(4, 4, 'Cinnamon 1 inch stick'),
(4, 5, 'Bay leaves 2'),
(4, 6, 'Cloves 5-6'),
(4, 7, 'Cumin seeds 1 teaspoon'),
(4, 8, 'Green cardamoms 3-4'),
(4, 9, 'Onions sliced 2 medium'),
(4, 10, 'Green chillies slit 3'),
(4, 11, 'Turmeric powder 1/4 teaspoon'),
(4, 12, 'Tomatoes chopped 2 medium'),
(4, 13, 'Salt to taste'),
(4, 14, 'Ginger paste 3/4 teaspoon'),
(4, 15, 'Garlic paste 3/4 teaspoon'),
(4, 16, 'Red chilli powder 1/2 teaspoon'),
(4, 17, 'Thick yogurt 1 cup'),
(4, 18, 'Onions sliced and fried 3 medium'),
(4, 19, 'Garam masala powder 1/2 teaspoon'),
(4, 20, 'Ginger cut into thin strips 1 inch piece'),
(4, 21, 'Fresh mint leaves torn a few'),
(4, 22, 'Fresh coriander leaves torn a few'),
(4, 23, 'Milk 1/2 cup'),
(4, 24, 'Rose water a few drops'),
(4, 25, 'Eggs boiled and sliced 4'),
(4, 26, ''),
(5, 1, 'Strawberry compote 3/4 cup'),
(5, 2, 'Hung yogurt 2 cups'),
(5, 3, 'Condensed milk 1 cup'),
(6, 1, 'Eggs 3'),
(6, 2, 'Castor sugar 5 tablespoon'),
(6, 3, 'Cornflour 2 teaspoons'),
(6, 4, 'Refined flour 1 tablespoon'),
(6, 5, 'Milk 2 cups'),
(6, 6, 'Fresh cream 1 cup'),
(6, 7, 'Vanilla pod 1'),
(6, 8, 'Layering'),
(6, 9, 'Sponge cubes as required'),
(6, 10, 'Sugar syrup as required'),
(6, 11, 'Ripe mango cubes as required'),
(6, 12, 'Fresh blueberries as required'),
(6, 13, 'Raspberry jelly cubes as required'),
(6, 14, 'Whipped cream For topping'),
(6, 15, 'Kiwi slices for garnish'),
(6, 16, 'Fresh cherries for garnish'),
(7, 1, 'Dark chocolate melted 150 grams'),
(7, 2, 'Orange juice ½ cup'),
(7, 3, 'Refined flour (maida) 1¼ cups'),
(7, 4, 'Granulated sugar 2 teaspoons'),
(7, 5, 'Cocoa powder ¼ cup'),
(7, 6, 'Baking powder 1 teaspoon'),
(7, 7, 'Butter 60 grams'),
(7, 8, 'Castor sugar (caster sugar) 1 cup'),
(7, 9, 'Eggs 2'),
(7, 10, 'Milk 1 cup'),
(7, 11, 'Orange rind 3 teaspoons'),
(8, 1, 'Vanilla pod 1'),
(8, 2, 'Tea bags 3'),
(8, 3, 'Fresh cream 2 cups'),
(8, 4, 'Egg yolks 5'),
(8, 5, 'Castor sugar (caster sugar) ½ cup'),
(8, 6, 'brown sugar/jaggery as required'),
(9, 1, 'Strawberry syrup 10 tablespoons'),
(9, 2, 'Soda 1/2 cup + 1 cup'),
(9, 3, 'Fresh mint leaves a few'),
(9, 4, 'Salt a pinch'),
(9, 5, 'Lemon juice 2 teaspoons'),
(9, 6, 'Ice cubes as required'),
(9, 7, 'Fresh mint sprigs for garnish '),
(10, 1, 'Carrot 1 medium'),
(10, 2, 'Ginger 1 1/2 inch'),
(10, 3, 'Tinned pineapple 6 slices'),
(10, 4, 'Pineapple juice 1 millilitre'),
(10, 5, 'Crushed ice as required'),
(10, 6, 'Honey 4 tablespoons'),
(10, 7, 'Lemon cut into round slices 1'),
(10, 8, 'Mint leaves a few sprigs'),
(11, 1, 'Fresh pineapple juice 1 3/4 cups'),
(11, 2, 'Thick coconut milk 8 tablespoons'),
(11, 3, 'Tender coconut flesh (malai) shredded 8 tablespoons'),
(11, 4, 'Vanilla ice cream 2 cups'),
(11, 5, 'Crushed ice as required'),
(11, 6, 'Pineapple chunks 1/2 cup'),
(11, 7, 'Tinned cherries 16-20'),
(12, 1, 'Blue curacao syrup 6 tablespoons'),
(12, 2, 'Lemons 4'),
(12, 3, 'Sugar syrup 6 tablespoons'),
(12, 4, 'Ice cubes as required'),
(12, 5, 'Drinking soda as required'),
(13, 1, 'Boneless chicken breasts 2'),
(13, 2, 'Salt to taste'),
(13, 3, 'Garlic crushed 1 teaspoon'),
(13, 4, 'Olive oil 3 teaspoons'),
(13, 5, 'Balsamic vinegar 3 teaspoons'),
(13, 6, 'Crushed black peppercorns 1½ teaspoons'),
(13, 7, 'Fresh rosemary sprigs 2-3'),
(13, 8, 'Fresh thyme sprigs 2-3'),
(13, 9, 'Button mushrooms halved 8-10'),
(13, 10, 'Red bell pepper ½ cut into dices'),
(13, 11, 'Green capsicum ½ cut into dices'),
(13, 12, 'Yellow bell pepper ½ cut into dices'),
(13, 13, 'Garlic chopped 1 teaspoon'),
(13, 14, 'Oil 2 teaspoons'),
(13, 15, 'Basil leaves 3-4 + for garnishing'),
(13, 16, 'Iceberg lettuce leaves 2-3'),
(13, 17, 'Lollorosso lettuce leaves 2-3'),
(13, 18, 'Arugula leaves 2-3'),
(13, 19, 'For dressing'),
(13, 20, 'Balsamic vinegar 1 tablespoon'),
(13, 21, 'Olive oil 3 tablespoons'),
(13, 22, 'Salt to taste'),
(13, 23, 'Crushed black peppercorns ¼ teaspoons'),
(14, 1, 'Oats Use Porridge 2 cups'),
(14, 2, 'Dried apricots 1/4 cup'),
(14, 3, 'Almonds 15-20'),
(14, 4, 'Blackcurrants 1/4 cup'),
(14, 5, 'Corn flakes 1 cup'),
(14, 6, 'Dried figs 1/4 cup'),
(14, 7, 'Strawberries as required'),
(14, 8, 'Honey to taste'),
(14, 9, 'Milk Cold/Hot as required'),
(14, 10, 'Yogurt as required'),
(15, 1, 'Eggs 4'),
(15, 2, 'Bacon rashers 2'),
(15, 3, 'Baby spinach leaves a few'),
(15, 4, 'Small brown bread pavs 2'),
(15, 5, 'Cream 8 tablespoons'),
(15, 6, 'Salt to taste'),
(16, 1, 'Chickpeas soaked overnight 1 cup'),
(16, 2, 'Parsley chopped 3-4'),
(16, 3, 'Spring onion greens chopped 2 stalks'),
(16, 4, 'Fresh parsley chopped 4 tablespoons'),
(16, 5, 'Fresh coriander leaves chopped 2 tablespoons'),
(16, 6, 'Bread crumbs dried 1/2 cup'),
(16, 7, 'Garlic chopped 1 teaspoon'),
(16, 8, 'Red chilli powder 1/2 teaspoon'),
(16, 9, 'Roasted cumin powder 1 teaspoon'),
(16, 10, 'Crushed peppercorns 1/4 teaspoon'),
(16, 11, 'Salt to taste'),
(16, 12, 'Baking soda 1/2 teaspoon'),
(16, 13, 'Lemon juice 2 teaspoons'),
(16, 14, 'Oil to brush 2 teaspoons');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sr` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sr`, `username`, `email`, `pass`) VALUES
(5, 'karishma', 'karishborkar03@gmail.com', 'karish1234'),
(6, 'chinmay', 'chinmay274@gmail.com', '1234'),
(7, 'mohini', 'mohini00@gmail.com', 'mohini@1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`dish_id`,`step`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`dish_id`,`rank`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
