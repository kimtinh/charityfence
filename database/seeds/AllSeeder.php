<?php

use Illuminate\Database\Seeder;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Nguyễn Văn A', 
                'email' => 'nguyenvana@gmail.com', 
                'password' => Hash::make('123123'), 
                'avatar' => 'images/user.png',
                'is_admin' => 0,
                // 'price_total' => 40000000,
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name' => 'Trần Văn B', 
                'email' => 'tranvanb@gmail.com', 
                'password' => Hash::make('123123'), 
                'avatar' => 'images/user.png',
                'is_admin' => 0,
                // 'price_total' => 40000000,
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name' => 'Nguyễn Thị C', 
                'email' => 'nguyenthic@gmail.com', 
                'password' => Hash::make('123123'), 
                'avatar' => 'images/user.png',
                'is_admin' => 0,
                // 'price_total' => 40000000,
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name' => 'Lê Văn D', 
                'email' => 'levand@gmail.com', 
                'password' => Hash::make('123123'), 
                'avatar' => 'images/user.png',
                'is_admin' => 0,
                // 'price_total' => 40000000,
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name' => 'Trần Hữu F', 
                'email' => 'tranhuuf@gmail.com', 
                'password' => Hash::make('123123'), 
                'avatar' => 'images/user.png',
                'is_admin' => 0,
                // 'price_total' => 40000000,
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name' => 'Lê Văn E', 
                'email' => 'levane@gmail.com', 
                'password' => Hash::make('123123'), 
                'avatar' => 'images/user.png',
                'is_admin' => 0,
                // 'price_total' => 40000000,
                'created_at' => Now(),
                'updated_at' => Now()
            ]
        ]);
        DB::table('campaign')->insert([
            [
                'name' => 'Scribbles Tour 2020',
                'status' => 1,
                'category_id' => 1,
                'amount' => 40000000,
                'price_total' => 2000000,
                'images' => 'images/campaign1.jpg',
                'date_end' => Date('Y-12-20'),
                'user_id' => 3,
                'description' => 'Tour từ thiện kết hợp dạy học cho các em nhỏ có hoàn cảnh khó khăn tại một số trung tâm nuôi dạy trẻ trên địa bàn Thành phố Hà Nội của dự án Scribbles.',
                'content' => 'Nội dung chiến dịch
                I, Tổng quan về dự án Scribbles
                1.Giới thiệu
                
                Scribbles là dự án được xây dựng và triển khai bởi các học sinh trường THPT chuyên Hà Nội - Amsterdam vào năm 2015 nhằm hướng tới sự phát triển toàn diện và định hướng tương lai của trẻ em, đặc biệt là các em nhỏ có hoàn cảnh khó khăn thông qua các hoạt động khác nhau qua từng mùa hoạt động.
                
                2.Mục đích
                
                Trang bị cho các em nhỏ những kiến thức và kĩ năng cơ bản cần thiết trong cuộc sống.
                Mang lại niềm vui, những phút giây thoải mái cho các em. Tạo ra một sân chơi lành mạnh, bổ ích và lý thú cho các em.
                Tổ chức một số buổi gây quỹ, từ thiện giúp đỡ trẻ em có hoàn cảnh khó khăn và giới thiệu về những thành quả các em nhỏ cũng như tổ chức đã đạt được.
                Thay đổi nhận thức của xã hội về tầm quan trọng của việc định hướng cho các em nhỏ, hướng tới sự phát triển bền vững, toàn diện của trẻ em.
                3.Đối tượng
                
                Tất cả các em nhỏ và học sinh trong độ tuổi từ 7-13 tuổi trên địa bàn thành phố Hà Nội.
                
                
                
                II, Giới thiệu Scribbles mùa 6
                1.Giới thiệu chủ đề mùa
                
                Sau thành công và bài học kinh nghiệm từ năm mùa tổ chức với các chủ đề “Mỹ Thuật”, “Lịch Sử”, “Văn hóa truyền thống”, “Khai phá tiềm năng” và “Họa ký tương lai”, năm nay Scribbles sẽ trở lại với một chủ đề thiết thực và tràn đầy ý nghĩa. Trong thời đại công nghệ phát triển, con người - vốn bị cuốn theo sự hối hả và bận rộn, đang dần quên đi những khoảnh khắc thực tại quý giá. Mỗi phút giây trôi qua, vô vàn những điều quan trọng xảy ra xung quanh mà bản thân ta đã và đang bỏ lỡ.  
                
                Nhận thấy sự cấp thiết của việc nâng cao nhận thức mỗi người về giá trị hiện tại, Scribbles mùa 6 với chủ đề “Kiến tạo khoảnh khắc” mong muốn gửi đến các em nhỏ những thái độ cần có trong cuộc sống hằng ngày. Với tinh thần, tuổi trẻ, các em hãy biết dành hết mình, sống nhiệt huyết, ý nghĩa trong từng khoảnh khắc. Chỉ có như vậy ta mới thực sự sử dụng thời gian có ích và tạo ra những kỉ niệm đẹp, hành trang cho sau này. Dù bánh xe thời gian không ngừng quay đưa ta đến với bến tàu tương lai đầy vội vã, các em hãy luôn giữ thái độ trân trọng hiện tại, bởi mỗi phút giây trôi qua không được quý trọng là một phút giây lãng phí bị bỏ lỡ.  
                
                2.Giới thiệu Scribbles’ Tour 2020
                
                Lấy cảm hứng từ chủ đề “Kiến Tạo Khoảnh Khắc”, Scribbles mùa 6 sẽ khai thác một trong những khía cạnh quan trọng nhất của cuộc sống hiện tại: Cảm xúc. Scribbles’ Tour 2020 sẽ trở lại, mang tên gọi - “Ấp Iu Thương.”
                
                Nhắc đến “Ấp Iu Thương” là gọi nhắc đến hình ảnh của những người nhóm lửa, những người truyền yêu thương. “Ấp iu” là ấp ủ và nâng niu, “Thương” tức là yêu thương. Hai hình ảnh gần gũi, thân thuộc nhưng tượng trưng những cảm xúc tích cực, đáng quý. 
                
                Cảm xúc tích cực được vun đắp, nhen nhóm lên từ những hành động nhỏ bé nhất nhưng chan chứa những ý nghĩa tốt đẹp. Quá trình nuôi dưỡng ấy cần sự tỉ mẩn, ân cần, chăm sóc của những người nhóm lửa - chính là cha mẹ, thầy cô, bạn bè xung quanh chúng ta. Quá trình vun đắp ấy không thể thiếu cách nhìn nhận, suy nghĩ đúng đắn mà bản thân mỗi người tự tạo ra, tiếp nhận và hướng đến.
                
                Với “Ấp Iu Thương”, Scribbles’ Tour 2020 hi vọng truyền tải cho các em những bài học bổ ích, lý thú, giúp các em có được những cảm xúc tích cực, đứng đắn trong cuộc sống thông qua những bài học: Nhận thức cảm xúc, Lăng kính cảm xúc, Kiềm chế cảm xúc,... và cùng các em lan tỏa những cảm xúc tích cực tới cộng đồng. Scribbles sẽ giúp đỡ và hy vọng các em nhận ra rằng: Hãy luôn mở lòng để trở thành những người nhóm lửa, truyền lửa ân cần, bởi trao gửi yêu thương là để nhận lại yêu thương. 
                
                3.Mục tiêu
                
                Đối với các em nhỏ, dự án Scribbles’ Tour 2020 hướng đến việc trang bị cho các em những kiến thức, bài học cần thiết về cảm xúc tích cực trong cuộc sống hiện đại; trau dồi những kỹ năng mềm, kỹ năng sống như kỹ năng làm việc nhóm, kỹ năng xử lý tình huống, kỹ năng giao tiếp… và tạo môi trường lành mạnh, sáng tạo cho các em học hỏi, tiếp thu và phát triển. Hơn nữa, Scribbles sẽ tạo cho các em môi trường thân thiện, cởi mở, từ đó các em có cơ hội được mở lòng, chia sẻ, tâm sự những vướng mắc bản thân đang gặp phải và cùng tìm ra hướng giải quyết. 
                Đối với các tình nguyện viên, Scribbles là cơ hội để các bạn làm việc trong một môi trường chuyên nghiệp, mở rộng các mối quan hệ, đồng thời tích lũy những kỹ năng cần thiết trong công tác xã hội, cũng như xây dựng kinh nghiệm tình nguyện cộng đồng của các bạn.
                Sau cùng, mục tiêu lớn nhất của dự án Scribbles là khuyến khích sự phát triển tự nhiên, toàn diện: tư duy sáng tạo, cởi mở.  '
            ],
            [
                'name' => 'Trao em Trang mới cuộc đời',
                'status' => 1,
                'category_id' => 1,
                'amount' => 65000000,
                'price_total' => 6000000,
                'user_id' => 4,
                'date_end' => Date('Y-11-20'),
                'images' => 'images/campaign2.jpg',
                'description' => 'Chiến dịch gây quỹ hỗ trợ làm giấy khai sinh cho trẻ em có hoàn cảnh khó khăn tại TP.Hồ Chí Minh',
                'content' => 'Về dự án Trang mới cuộc đời: Dự án “Trang mới cuộc đời (A new life page)” - Dự án Thúc đẩy quyền được khai sinh cho trẻ em có hoàn cảnh khó khăn tại thành phố Hồ Chí Minh, được thực hiện bởi Viện Nghiên cứu quản lý phát triển bền vững (MSD) và nhóm Trang mới cuộc đời từ năm 2014. Các kết quả dự kiến của Dự án “Trang mới cuộc đời” bao gồm: (1) Hỗ trợ làm giấy khai sinh cho trẻ em có hoàn cảnh khó khăn tại thành phố Hồ Chí Minh; (2) Truyền thông nâng cao nhận thức cộng đồng và kết nối các nguồn lực để hỗ trợ làm giấy khai sinh chó trẻ em có hoàn cảnh khó khăn; (3) Vận động và kiến nghị sửa đổi chính sách và quy trình tư pháp thân thiện hỗ trợ thực hiện quyền được khai sinh cho mọi trẻ em. Cùng với sự hỗ trợ của Rapper Wowy Nguyễn, MSD và nhóm Trang mới cuộc đời sẽ tiếp tục khởi động chiến dịch truyền thông và gây quỹ để làm giấy khai sinh cho trẻ em trong giai đoạn tiếp theo 2020 – 2021.
                Về Viện Nghiên cứu Quản lý Phát triển bền vững (MSD)
                
                Là một tổ chức phi chính phủ Việt Nam, MSD nỗ lực hành động vì một môi trường phát triển thuận lợi cho sự phát triển của khối các tổ chức xã hội và thúc đẩy việc thực hiện quyền của các nhóm cộng đồng bị lề hoá và dễ bị tổn thương, đặc biệt là nhóm trẻ em, thanh niên, phụ nữ và người khuyết tật. Hiện nay, MSD được công nhận là một tổ chức hàng đầu trong việc phối hợp, hỗ trợ và cung cấp các dịch vụ nâng cao năng lực, đào tạo và tham vấn cho các tổ chức xã hội tại Việt Nam. Thêm vào đó, MSD cũng là một tổ chức chuyên nghiệp đáp ứng hiệu quả nhu cầu và bảo vệ quyền lợi của các đối tượng có hoàn cảnh khó khăn, thông qua tổ chức các dự án và hỗ trợ trẻ em, thanh thiếu niên, phụ nữ, người vô gia cư, người nhập cư và người khuyết tật tại Việt Nam.',
            ],
            [
                'name' => 'Tran Manh Linh - IvyPrep For Humanity',
                'status' => 1,
                'category_id' => 1,
                'user_id' => 5,
                'amount' => 8000000,
                'price_total' => 4000000,
                'images' => 'images/campaign4.jpg',
                'date_end' => Date('Y-12-28'),
                'description' => 'Chiến dịch xây nhà vì cộng đồng của các bạn học sinh IvyPrep',
                'content' => 'Home, such a simple, yet complex word; It can be presumed as just a place to sleep, for people like us, that is. Many other human beings are living a life without such comfort, but we always take a blind eye towards it, intentionally-I am no exception-. But as time passed by, I began to notice this; And sympathize with those people, how we are all the same, but live such different lives just because of this merciless chance game called: fate. Furthermore, I am even more upset with myself for not noticing sooner, and have always wanted a chance to help; always dreamt, plan, fantasize but never realize that I am just wasting my time, living in some fairy tales. But now I have an opportunity, here at IvyPrep.
                We at IvyPrep have started a cooperation with Habitat for Humanity an organization that aims to help with poverty house problems. And we are launching a campaign with various steps, towards helping unlucky people in Đồng Tháp. Although this is our campaign we are also in need of you readers, to support us on our lack of funding for the operation. 
                
                
                
                For people who want to help but are in a condition where they cannot support with funding, you can still spread out the word to people around you.
                
                
                
                Thank you for reading this, we hope you have a wonderful day. And remember, every little bit counts. '
            ],
            [
                'name' => 'Do Nhat Vy - IvyPrep For Humanity',
                'status' => 1,
                'category_id' => 1,
                'amount' => 65000000,
                'user_id' => 3,
                'price_total' => 420000,
                'images' => 'images/campaign3.jpg',
                'date_end' => Date('Y-12-20'),
                'description' => 'Chiến dịch xây nhà vì cộng đồng của các bạn học sinh IvyPrep',
                'content' => 'Đâu đó trên mảnh đất Việt Nam này vẫn còn những số phận bé nhỏ đang lang thang không nơi nương tựa. Hơn nữa, đại dịch Covid-19 càng tạo nên áp lực cho các gia đình về mặt kinh tế để có thể chi trả cho căn nhà của họ. Theo tổng cục thống kê về tình hình lao động nước ta gần đây: “Tỷ lệ thiếu việc làm của lao động trong độ tuổi quý II năm 2020 là 2,97%, tăng 0,76 điểm phần trăm so với quý trước và tăng 1,5 điểm phần trăm so với cùng kỳ năm trước. Tỷ lệ thiếu việc làm của lao động trong độ tuổi ở khu vực nông thôn cao gấp 1,5 lần so với khu vực thành thị.” Cảm thông với cuộc sống vất vả của các gia đình, trung tâm anh ngữ Ivyprep, cùng với sự hợp tác với Habitat for Humanity, đã lên kế hoạch hỗ trợ xây dựng một căn nhà ở Đồng Tháp dưới sự giúp đỡ trực tiếp của 14 bạn học sinh ở Ivyprep. Nhiệm vụ của chúng mình chính là tạo cơ hội cho những gia đình có một mái ấm vững chắc, nâng cao đời sống cộng đồng, và để những đứa trẻ có 1 tương lai tương sáng hơn, bình đẳng như bao đứa trẻ khác. Tuy nhiên, chúng mình ko thể hoàn thành được mục tiêu này nếu ko thiếu sự hỗ trợ của các bạn!'
            ]
        ]);
    }
}
