<?php

namespace Database\Seeders;

use App\Models\OptionPage;
use Illuminate\Database\Seeder;

class OptionPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            // Page Home
            [
                'page'              => 'home',
                'status'            => 1,
                'key'               => 'feature',
                'name'              => 'Perusahaan',
                'name_en'           => 'Company',
                'name_ch'           => '公司',
                'name_ar'           => 'شركة',
                'featured_image'    => 'html/assets/corporate_fare.svg',
                'content'           => '
                    PT. Pandafood Kreasi Indonesia berdiri sejak Maret 2012 dengan fokus dalam penggunaan rumput laut sebagai bahan utama makanan ringan, terutama snack Panda Seaweed dan Mininori. Setelah berbadan hukum pada September
                    2015, perusahaan ini memperluas jangkauan distribusinya ke seluruh Jawa-Bali dan beberapa area di luar Pulau
                    Jawa, serta memproduksi private label untuk perusahaan retail modern terkemuka di Indonesia. Dengan komitmen
                    pada pengembangan distribusi, peningkatan kualitas produk, dan kepuasan pelanggan, Pandafood Kreasi
                    Indonesia terus berkembang sebagai pemain utama dalam industri makanan ringan di Indonesia.',
                'content_en'        => '
                    PT. Pandafood Kreasi Indonesia was founded in March 2012 with a focus on using seaweed as an ingredient the main ingredient in snacks, especially Panda Seaweed and Mininori snacks. After becoming a legal entity
                    in September In 2015, this company expanded its distribution reach throughout Java-Bali and several areas outside the
                    island Java, as well as producing private labels for leading modern retail companies in Indonesia. With commitment
                    on distribution development, improving product quality and customer satisfaction, Pandafood Kreasi
                    Indonesia continues to develop as a major player in the snack food industry in Indonesia.',
                'content_ch'        => '
                    PT。 Pandafood Kreasi Indonesia 成立于 2012 年 3 月，专注于使用海藻作为原料
                    零食的主要成分，尤其是熊猫海苔和米尼诺零食。 9月成为法人后
                    2015 年，该公司将分销范围扩大到爪哇岛、巴厘岛和岛外的几个地区
                    Java，以及为印度尼西亚领先的现代零售公司生产自有品牌。有承诺
                    关于分销发展、提高产品质量和客户满意度，Pandafood Kreasi
                    印度尼西亚继续发展成为印度尼西亚休闲食品行业的主要参与者',
                'content_ar'        => '
                    حزب العمال. تأسست شركة Pandafood Kreasi Indonesia في مارس 2012 مع التركيز على استخدام الأعشاب البحرية كمكون
                    المكون الرئيسي في الوجبات الخفيفة، وخاصة أعشاب الباندا البحرية والوجبات الخفيفة من مينينوري. بعد أن أصبحت كيانًا قانونيًا في سبتمبر
                    في عام 2015، قامت هذه الشركة بتوسيع نطاق التوزيع في جميع أنحاء جاوة-بالي والعديد من المناطق خارج الجزيرة
                    Java، بالإضافة إلى إنتاج علامات تجارية خاصة لشركات البيع بالتجزئة الحديثة الرائدة في إندونيسيا. مع الالتزام
                    حول تطوير التوزيع وتحسين جودة المنتج ورضا العملاء، Pandafood Kreasi
                    تواصل إندونيسيا التطور كلاعب رئيسي في صناعة الأطعمة الخفيفة في إندونيسيا.',
            ],
            [
                'page'              => 'home',
                'status'            => 1,
                'key'               => 'feature',
                'name'              => 'Produk',
                'name_en'           => 'Products',
                'name_ch'           => '产品',
                'name_ar'           => 'منتجات',
                'featured_image'    => 'html/assets/snack 2.svg',
                'content'           => '
                    PT. Pandafood Kreasi Indonesia fokus dalam penggunaan rumput laut sebagai bahan utama makanan ringan,terutama snack Panda Seaweed dan Mininori.',
                'content_en'        => '
                    PT. Pandafood Kreasi Indonesia focuses on using seaweed as the main ingredient in snacks, especially Panda Seaweed and Mininori snacks.',
                'content_ch'        => 'PT。 Pandafood Kreasi Indonesia专注于以海藻为主要原料的零食，特别是Panda Seaweed和Mininori零食。',
                'content_ar'        => '
                    حزب العمال. تركز شركة Pandafood Kreasi Indonesia على استخدام الأعشاب البحرية كمكون رئيسي في الوجبات الخفيفة، وخاصة أعشاب الباندا البحرية والوجبات الخفيفة من Mininori.',
            ],
            [
                'page'              => 'home',
                'status'            => 1,
                'key'               => 'feature',
                'name'              => 'Kemitraan',
                'name_en'           => 'Partnership',
                'name_ch'           => '合伙',
                'name_ar'           => 'شراكة',
                'featured_image'    => 'html/assets/handshake.svg',
                'content'           => '
                    Membuka peluang kerjasama yang dinamis untuk menciptakan masa depan yang lebih baik bagi semua.
                    Dengan fokus pada industri makanan, perusahaan ini mengundang untuk kemitraan yang saling
                    menguntungkan, kolaboratif, dan penuh inspirasi.',
                'content_en'        => 'Opening opportunities for dynamic cooperation to create a better future for all.
                    With a focus on the food industry, the company invites mutual partnerships
                    profitable, collaborative, and inspiring.',
                'content_ch'        => '
                    开启充满活力的合作机会，为所有人创造更美好的未来。公司专注于食品行业，诚邀合作伙伴 有利可图、协作且鼓舞人心。',
                'content_ar'        => '
                    فتح الفرص للتعاون الديناميكي لخلق مستقبل أفضل للجميع.
                    مع التركيز على صناعة المواد الغذائية، تدعو الشركة إلى إقامة شراكات متبادلة
                    مربحة وتعاونية وملهمة',
            ],
            [
                'page'              => 'home',
                'status'            => 1,
                'key'               => 'feature',
                'name'              => 'Karir',
                'name_en'           => 'Career',
                'name_ch'           => '职业',
                'name_ar'           => 'حياة مهنية',
                'featured_image'    => 'html/assets/work.svg',
                'content'           => '
                    Menonjolkan komitmennya dalam membuka lapangan kerja yang dinamis dan kolaboratif. Dengan fokus pertumbuhan industri makanan, perusahaan ini berupaya menciptakan lingkungan kerja yang memotivasi, memungkinkan kolaborasi
                    yang kuat, dan mendorong inovasi dalam upaya mencapai masa depan yang lebih baik bagi semua pihak yang
                    terlibat.',
                'content_en'        => '
                    Highlighting its commitment to opening dynamic and collaborative employment opportunities. With a growth focus food industry, the company   strives to create a motivating, enabling work environment collaboration strong, and encourage innovation in an effort to achieve a better future for all parties involved involved.',
                'content_ch'        => '强调其致力于创造充满活力和协作的就业机会。以增长为重点 在食品行业，公司致力于创造一个激励人心、有利的工作环境 合作 坚强，鼓励创新，努力为各方创造更美好的未来 涉及。',
                'content_ar'        => '
                    إبراز التزامها بفتح فرص عمل ديناميكية وتعاونية. مع التركيز على النمو
                    صناعة المواد الغذائية، تسعى الشركة جاهدة لخلق بيئة عمل محفزة وممكنة
                    تعاون
                    قوية، وتشجيع الابتكار في محاولة لتحقيق مستقبل أفضل لجميع الأطراف المعنية
                    متضمن',
            ],

            // Page Company
            [
                'page'              => 'company',
                'status'            => 1,
                'key'               => 'desc',
                'name'              => 'Keterangan',
                'name_en'           => 'Description',
                'name_ch'           => '描述',
                'name_ar'           => 'وصف',
                'featured_image'    => null,
                'content'           => '
                    PT. Pandafood Kreasi Indonesia berdiri sejak Maret 2012 dengan fokus dalam penggunaan rumput laut sebagai bahan utama makanan ringan, terutama snack Panda Seaweed dan Mininori. Setelah berbadan hukum pada September
                    2015, perusahaan ini memperluas jangkauan distribusinya ke seluruh Jawa-Bali dan beberapa area di luar Pulau
                    Jawa, serta memproduksi private label untuk perusahaan retail modern terkemuka di Indonesia. Dengan komitmen
                    pada pengembangan distribusi, peningkatan kualitas produk, dan kepuasan pelanggan, Pandafood Kreasi
                    Indonesia terus berkembang sebagai pemain utama dalam industri makanan ringan di Indonesia.',
                'content_en'        => '
                    PT. Pandafood Kreasi Indonesia was founded in March 2012 with a focus on using seaweed as an ingredient the main ingredient in snacks, especially Panda Seaweed and Mininori snacks. After becoming a legal entity
                    in September In 2015, this company expanded its distribution reach throughout Java-Bali and several areas outside the
                    island Java, as well as producing private labels for leading modern retail companies in Indonesia. With commitment
                    on distribution development, improving product quality and customer satisfaction, Pandafood Kreasi
                    Indonesia continues to develop as a major player in the snack food industry in Indonesia.',
                'content_ch'        => '
                    PT。 Pandafood Kreasi Indonesia 成立于 2012 年 3 月，专注于使用海藻作为原料
                    零食的主要成分，尤其是熊猫海苔和米尼诺零食。 9月成为法人后
                    2015 年，该公司将分销范围扩大到爪哇岛、巴厘岛和岛外的几个地区
                    Java，以及为印度尼西亚领先的现代零售公司生产自有品牌。有承诺
                    关于分销发展、提高产品质量和客户满意度，Pandafood Kreasi
                    印度尼西亚继续发展成为印度尼西亚休闲食品行业的主要参与者',
                'content_ar'        => '
                    حزب العمال. تأسست شركة Pandafood Kreasi Indonesia في مارس 2012 مع التركيز على استخدام الأعشاب البحرية كمكون
                    المكون الرئيسي في الوجبات الخفيفة، وخاصة أعشاب الباندا البحرية والوجبات الخفيفة من مينينوري. بعد أن أصبحت كيانًا قانونيًا في سبتمبر
                    في عام 2015، قامت هذه الشركة بتوسيع نطاق التوزيع في جميع أنحاء جاوة-بالي والعديد من المناطق خارج الجزيرة
                    Java، بالإضافة إلى إنتاج علامات تجارية خاصة لشركات البيع بالتجزئة الحديثة الرائدة في إندونيسيا. مع الالتزام
                    حول تطوير التوزيع وتحسين جودة المنتج ورضا العملاء، Pandafood Kreasi
                    تواصل إندونيسيا التطور كلاعب رئيسي في صناعة الأطعمة الخفيفة في إندونيسيا.',
            ],
            [
                'page'              => 'company',
                'status'            => 1,
                'key'               => 'visi',
                'name'              => 'Visi',
                'name_en'           => 'Vision',
                'name_ch'           => '想象',
                'name_ar'           => 'رؤية',
                'featured_image'    => null,
                'content'           => 'Menghadirkan snack berkualitas yang dapat dijangkau oleh semua kalangan.',
                'content_en'        => 'Providing quality snacks that are accessible to all groups.',
                'content_ch'        => '提供所有群体均可享用的优质零食。',
                'content_ar'        => 'توفير وجبات خفيفة عالية الجودة وفي متناول جميع الفئات.',
            ],
            [
                'page'              => 'company',
                'status'            => 1,
                'key'               => 'misi',
                'name'              => 'Misi',
                'name_en'           => 'Mission',
                'name_ch'           => '使命',
                'name_ar'           => 'مهمة',
                'featured_image'    => null,
                'content'           => '
                    1. Membangun brand dengan produk yang berkualitas dan harga terjangkau. <br>
                    2. Mengedepankan inovasi produk sesuai selera konsumen.<br>
                    3. Mengupayakan efisiensi dalam setiap proses bisnis. <br>
                    4. Memberikan kontribusi positif bagi lingkungan dan sosial dimana perusahaan berada.',
                'content_en'        => '
                    1. Build a brand with quality products and affordable prices.<br>
                    2. Prioritize product innovation according to consumer tastes. <br>
                    3. Striving for efficiency in every business process. <br>
                    4. Make a positive contribution to the environment and society where the company is located.',
                'content_ch'        => '
                    1. 以優質的產品、實惠的價格打造品牌。<br>
                    2. 依據消費者口味優先進行產品創新。<br>
                    3. 在每个业务流程中力求效率。<br>
                    4. 为公司所在地的环境和社会做出积极的贡献。',
                'content_ar'        => '
                    1. بناء علامة تجارية بمنتجات عالية الجودة وأسعار معقولة. <br>
                    2. تحديد أولويات ابتكار المنتجات وفقًا لأذواق المستهلكين. <br>
                    3. السعي لتحقيق الكفاءة في كل عملية تجارية. <br>
                    4. تقديم مساهمة إيجابية للبيئة والمجتمع الذي تقع فيه الشركة. ',
            ],

            // Page Partnership
            [
                'page'              => 'partnership',
                'status'            => 1,
                'key'               => 'banner_text_bold',
                'name'              => 'Banner Text Bold',
                'name_en'           => 'Banner Text Bold',
                'name_ch'           => '横幅文字粗体',
                'name_ar'           => 'نص الشعار غامق',
                'featured_image'    => null,
                'content'           => 'Lebih dari 100+ Mitra Pandafood di seluruh Indonesia',
                'content_en'        => 'More than 100+ Pandafood Partners throughout Indonesia',
                'content_ch'        => '印度尼西亚境内超过 100 多家 Pandafood 合作伙伴',
                'content_ar'        => 'أكثر من 100+ شريك Pandafood في جميع أنحاء إندونيسيا',
            ],
            [
                'page'              => 'partnership',
                'status'            => 1,
                'key'               => 'banner_text_medium',
                'name'              => 'Banner Text Medium',
                'name_en'           => 'Banner Text Medium',
                'name_ch'           => '中等文本横幅',
                'name_ar'           => 'لافتات نصية متوسطة',
                'featured_image'    => null,
                'content'           => 'Snack rumput laut yang paling the best di Indonesia',
                'content_en'        => 'The best seaweed snack in Indonesia',
                'content_ch'        => '印度尼西亚最好的海藻小吃',
                'content_ar'        => 'أفضل وجبة خفيفة من الأعشاب البحرية في إندونيسيا',
            ],
            [
                'page'              => 'partnership',
                'status'            => 1,
                'key'               => 'desc',
                'name'              => 'Kemitraan',
                'name_en'           => 'Partnership',
                'name_ch'           => '合伙',
                'name_ar'           => 'شراكة',
                'featured_image'    => null,
                'content'           => '
                Membuka peluang kerjasama yang dinamis untuk menciptakan masa depan yang lebih baik bagi semua. Dengan fokus pada industri makanan, perusahaan ini mengundang untuk kemitraan yang saling menguntungkan, kolaboratif, dan penuh inspirasi.',
                'content_en'        => '
                Opening opportunities for dynamic cooperation to create a better future for all. With a focus on the food industry, the company invites mutually beneficial, collaborative and inspiring partnerships.',
                'content_ch'        => '开启充满活力的合作机会，为所有人创造更美好的未来。 该公司专注于食品行业，诚邀互利、协作和鼓舞人心的合作伙伴。',
                'content_ar'        => '
                فتح الفرص للتعاون الديناميكي لخلق مستقبل أفضل للجميع. ومع التركيز على صناعة المواد الغذائية، تدعو الشركة إلى إقامة شراكات متبادلة المنفعة وتعاونية وملهمة.',
            ],

            // Page Career
            [
                'page'              => 'career',
                'status'            => 1,
                'key'               => 'quote',
                'name'              => 'Kutipan',
                'name_en'           => 'Quote',
                'name_ch'           => '引用',
                'name_ar'           => 'يقتبس',
                'featured_image'    => null,
                'content'           => 'Menginspirasi Pertumbuhan, Mewujudkan Masa Depan yang Lebih Baik',
                'content_en'        => 'Inspiring Growth, Creating a Better Future',
                'content_ch'        => '激励成长，创造美好未来',
                'content_ar'        => 'إلهام النمو وخلق مستقبل أفضل',
            ],
            [
                'page'              => 'career',
                'status'            => 1,
                'key'               => 'desc',
                'name'              => 'Keterangan',
                'name_en'           => 'Description',
                'name_ch'           => '描述',
                'name_ar'           => 'وصف',
                'featured_image'    => null,
                'content'           => '
                    Menonjolkan komitmennya dalam membuka lapangan kerja yang dinamis dan kolaboratif. Dengan fokus pertumbuhan industri makanan, perusahaan ini berupaya menciptakan lingkungan kerja yang memotivasi, memungkinkan kolaborasi yang kuat, dan mendorong inovasi dalam upaya mencapai masa depan yang lebih baik bagi semua pihak yang terlibat.',
                'content_en'        => '
                    Highlighting its commitment to opening dynamic and collaborative employment opportunities. With a focus on the growth of the food industry, the company strives to create a work environment that motivates, enables strong collaboration, and encourages innovation in an effort to achieve a better future for all parties involved.',
                'content_ch'        => '
                    强调其致力于创造充满活力和协作的就业机会。 公司专注于食品行业的发展，努力创造一个激励、加强协作、鼓励创新的工作环境，为所有相关方创造更美好的未来。',
                'content_ar'        => '
                    إبراز التزامها بفتح فرص عمل ديناميكية وتعاونية. ومع التركيز على نمو صناعة المواد الغذائية، تسعى الشركة جاهدة لخلق بيئة عمل تحفز وتمكن التعاون القوي وتشجع الابتكار في محاولة لتحقيق مستقبل أفضل لجميع الأطراف المعنية.',
            ],
            [
                'page'              => 'career',
                'status'            => 1,
                'key'               => 'disclaimer',
                'name'              => 'Penafian',
                'name_en'           => 'Disclaimer',
                'name_ch'           => '免责声明',
                'name_ar'           => 'تنصل',
                'featured_image'    => '/html/assets/Slice 1.svg',
                'content'           => '
                <p><span style="font-size: 12pt;"><strong>HARAP HATI-HATI TERHADAP PENIPUAN PEREKRUTAN</strong></span></p>
                <p><span style="font-size: 12pt;">Karena PT.Pandafood Kreasi Indonesia, tidak pernah memungut biaya atau imbalan apapun dalam bentuk apapun kepada pelamar</span></p>
                <p><span style="font-size: 12pt;">&nbsp;Harap berhati-hati terhadap penipuan lowongan kerja yang mengatasnamakan <strong>PT.Pandafood Kreasi Indonesia</strong>. Harap diperhatikan bahwa tim perekrut PT.Pandafood Kreasi Indonesia, Hanya menggunakan alamat email resmi berakhiran <strong>@pandafoodindonesia.com</strong></span></p>',
                'content_en'        => '
                <p><strong>PLEASE BEWARE OF RECRUITMENT FRAUD</strong></p>
                <p>Because PT Pandafood Kreasi Indonesia never charges applicants any fees or compensation in any form</p>
                <p>Please be careful of fraudulent job vacancies in the name of PT Pandafood Kreasi Indonesia. Please note that the <strong>PT.Pandafood Kreasi Indonesia</strong> recruitment team only uses official email addresses ending in <strong>@pandafoodindonesia.com</strong></p>',
                'content_ch'        => '
                <p><strong>请谨防招聘诈骗</strong></p>
                <p>因为 PT Pandafood Kreasi Indonesia 从未以任何形式向申请人收取任何费用或补偿</p>
                <p>请警惕以 <strong>PT Pandafood Kreasi Indonesia</strong> 名义的欺诈性职位空缺。 请注意，PT.Pandafood Kreasi Indonesia 招聘团队仅使用以 <strong>@pandafoodindonesia.com</strong> 结尾的官方电子邮件地址</p>',
                'content_ar'        => '
                <p><strong>يرجى الحذر من الاحتيال في التوظيف</strong></p>
                <p>لأن PT Pandafood Kreasi Indonesia لا تفرض أبدًا على المتقدمين أي رسوم أو تعويضات بأي شكل من الأشكال</p>
                <p>يرجى توخي الحذر من الوظائف الشاغرة الاحتيالية باسم PT Pandafood Kreasi Indonesia. يرجى ملاحظة أن فريق التوظيف <strong>PT.Pandafood Kreasi Indonesia</strong> يستخدم فقط عناوين البريد الإلكتروني الرسمية التي تنتهي بـ <strong>@pandafoodindonesia.com</strong></p>',
            ],
        ];

        OptionPage::insert($items);
    }
}
