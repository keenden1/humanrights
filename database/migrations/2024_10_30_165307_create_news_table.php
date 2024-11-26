<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->text('story')->nullable();
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->timestamps();
        });
        $this->news();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }

    private function news(): void
    {
        DB::table('news')->insert([
            'title' => 'COVID-19 Pandemic',
            'date' => '2024-10-28',
            'story' => 'The Magna Carta of Women identifies indigenous women and girls as one of the sectors of women whose rights need to be protected, promoted, and upheld. Crucial as well in the fulfillment of their fundamental freedoms is the elimination of discrimination against them.

However, when COVID-19 lockdowns were implemented across the country, many within their sector were severely and disproportionately impacted. Issues that existed prior to the pandemic were further exacerbated by the challenges brought about by COVID-19. One Higaonon woman leader recounts, “Many of us in our community worked as farm workers, construction workers, and domestic helpers. But because of the lockdown, most were forced to stop working by our employers to avoid transmitting the virus or because there was no more transportation that could take us to our jobs.”

The Commission on Human Rights (CHR), as Gender Ombud, through its Center for Gender Equality and Women Human Rights (GEWHRC) and in partnership with LILAK (Purple Action for Indigenous Women’s Rights), looked closer into the plight of indigenous women and girls during the pandemic—How are these issues being addressed by the government? Are the current realities of indigenous women taken into account by the COVID 19 Inter-Agency Task Force, relevant agencies, and local government units?

This report endeavors to document the worries and anxieties of indigenous women and girls, but most of all, their persistence in asserting their fundamental rights. The data and analysis covered also spans across several topics crucial to their quality of life and well being, such as food security, livelihood, health, education, indigenous rights defense work, and political participation.

It must be noted as well that the responses of this report came directly from indigenous women participants, aged 15 to 65, of communities from Region X, XII, CAR and CARAGA. In the discussions, they themselves articulated the recommendations on how to address these challenges; grounded on their lived experiences before and during the pandemic.

CHR hopes that this research provides pertinent insights for lawmakers and civil society organizations involved in policy and advocacy work. We, likewise, look forward to the acknowledgement of various relevant government agencies responsible for direct services for indigenous women.

As the country tries to return to normal amid the effects of COVID-19, let us call for a more inclusive recovery plan that ensures that no one—especially indigenous women and girls—is left behind.',
            'image_1' => '1.png',
            'image_2' => '2.png',
            'image_3' => '3.png',
        ]);

        DB::table('news')->insert([
            'title' => 'SENIOR CITIZEN Center',
            'date' => '2022-07-06',
            'story' => 'The Commission on Human Rights (CHR) in Region III interceded to ensure the reconstruction of the Senior Citizen Center in Harmony Hills Subdivision in San Jose Del Monte, Bulacan. A portion of the said senior facility was mistakenly demolished during a clearing operation conducted by the local government unit (LGU) of San Jose Del Monte City on 19 March 2022 to expand the space for the City Health Center VII. CHR Special Investigators (SI) Norberto Fontillas and Joel Ocampo responded to the complaint of the Senior Citizens Association and facilitated a dialogue between the association and the barangay officials who led the clearing operations on 24 March 2022. The barangay officials of Muzon clarified that they only intended to clear obstructive structures, which included a garage attached to the back of the Senior Citizen Center hence accidentally damaging the center.

                    Through the CHR’s intervention, the barangay officials took full responsibility for the structural damages to the Senior Citizen Center. Jonathan S. Gumabon, the Officer-in-Charge of Annex 2, Barangay Muzon, committed to reconstructing and repairing the facility as well as replacing old roofing sheets with new ones. He also offered the annex of the barangay hall to serve as the temporary center of the elderly while the reconstruction is ongoing.

                    Victoria Bondoc and Rosalie Bueno, officers of the Senior Citizen Association, expressed gratitude and appreciation for the prompt and compassionate service of the CHR Region III. They also conveyed their satisfaction of the commitment and initial response of OIC Gumabon.

                    “Dahil sa CHR, agad na tiniyak ng barangay at LGU na pananagutan ang damage sa aming Center. Umaksyon agad ang mga kawani ng CHR at tinulungan kami para matiyak ang commitment at agreement mula sa barangay at LGU,” Bondoc said.

                    The LGU’s city engineer also took the initiative to assess the integrity of the entire facility. Through the efforts of CHR investigators Fontillas and Ocampo, the LGU and the barangay officials also committed to fully ensuring the safety of the building during the reconstruction process.

                    SI Fontillas explained the importance of the Senior Citizen Center to ensure the welfare and wellness of the members of the Senior Citizen Association.

                    “Ang Senior Citizen Center ay parang second home na ng mga seniors doon sa area. Dito sila nag-mi-meeting at community talaga nila ito kaya mahalaga na maayos ang nasirang center nila,” SI Fontillas said.',
             'image_1' => '4.png',
            'image_2' => '5.png',
            'image_3' => '6.png',
        ]);

  
        DB::table('news')->insert([
            'title' => 'HEALTH AND SAFETY',
            'date' => '2022-07-09',
            'story' => 'The Commission on Human Rights (CHR) in Region III held a simple awarding ceremony on 22
March 2022 to recognize the best practices and initiatives of the Guimba District Jail in the
protection and promotion of the rights of inmates during the pandemic.

Present during the ceremony was Jail Inspector Jose Lennon III, Chief Security and Control, to receive the recognition on behalf of Jail  Chief Inspector Darrel Grazula, Guimba District Jail Warden. This commendation comes after the regional office’s findings during its unannounced jail visit on 18 January 2022. The jail visitation conducted by CHR Regional Director Atty.  Leorae Valmonte, Senior Investigators (SI) Elmer Maniego, Norberto Fontillas, and Ishmael  Chauhan found that the district jail under the administration of Senior Inspector Grazula has enacted several measures to aid in protecting and promoting both the mental and physical health of persons deprived of liberty (PDLs) under their care.',
            'image_1' => '7.png',
            'image_2' => '8.png',
            'image_3' => '9.png',
        ]);
       
    }
};
