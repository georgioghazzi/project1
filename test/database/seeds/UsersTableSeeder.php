<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name="Admin";
        $admin->email="admin@geo.com";
        $admin->password="123456";
        $admin->user_type="admin";
        $admin->save();


        $chef = new Admin;
        $chef->name="Chef";
        $chef->email="chef@geo.com";
        $chef->password="123456";
        $chef->user_type="chef";
        $chef->save();

        
        $staff= new Admin;
        $staff->name="staff";
        $staff->email="staff@geo.com";
        $staff->password="123456";
        $staff->user_type="staff";
        $staff->save();


        $item = new Recipes;
        $item->name="kousa";
        $item->items="Bacon ipsum dolor amet pork belly tri-tip ball tip, kevin pastrami buffalo andouille rump turducken pork chop meatball pork loin. Strip steak andouille buffalo flank, capicola beef kevin pork loin pastrami venison shank rump cow kielbasa. Venison pork chop chicken, porchetta tenderloin burgdoggen sausage ball tip pork shoulder filet mignon meatball short ribs. Beef shank doner, buffalo pork pancetta ground round strip steak tail hamburger short loin pork loin.";
        $item->description="Venison tenderloin buffalo, chuck t-bone ribeye meatball prosciutto burgdoggen pig jerky landjaeger doner. Kielbasa bresaola picanha venison, cow pancetta turducken jerky tongue. Ribeye pastrami ham hock pork belly meatloaf, capicola short loin swine pork t-bone. T-bone strip steak drumstick shank. Short ribs shoulder meatball, rump salami jowl flank ribeye jerky doner shank chicken ham pastrami turkey.";
        $item->imagePath="http://www.cooktube.in/wp-content/uploads/2016/10/Kousa-Mahshi-Lebanese-Stuffed-Zucchini.jpg";
        $item->save();

        
    }
}
