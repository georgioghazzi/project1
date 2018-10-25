<?php

use Illuminate\Database\Seeder;
use App\admin;
use App\Recipes;
use App\User;
class data extends Seeder
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
        $admin->password=Hash::make("123456");
        $admin->user_type="admin";
        $admin->save();


        $chef = new Admin;
        $chef->name="Chef";
        $chef->email="chef@geo.com";
        $chef->password=Hash::make("123456");
        $chef->user_type="chef";
        $chef->save();

        
        $staff= new Admin;
        $staff->name="staff";
        $staff->email="staff@geo.com";
        $staff->password=Hash::make("123456");
        $staff->user_type="staff";
        $staff->save();


        $user = new User;
        $user->name="User";
        $user->email="user@geo.com";
        $user->password=Hash::make("123456");
        $user->address="Lebanon";
        $user->save();

        $item = new Recipes;
        $item->name="kousa";
        $item->items="Bacon ipsum dolor amet pork belly tri-tip ball tip, kevin pastrami buffalo andouille rump turducken pork chop meatball pork loin. Strip steak andouille buffalo flank, capicola beef kevin pork loin pastrami venison shank rump cow kielbasa. Venison pork chop chicken, porchetta tenderloin burgdoggen sausage ball tip pork shoulder filet mignon meatball short ribs. Beef shank doner, buffalo pork pancetta ground round strip steak tail hamburger short loin pork loin.";
        $item->description="Venison tenderloin buffalo, chuck t-bone ribeye meatball prosciutto burgdoggen pig jerky landjaeger doner. Kielbasa bresaola picanha venison, cow pancetta turducken jerky tongue. Ribeye pastrami ham hock pork belly meatloaf, capicola short loin swine pork t-bone. T-bone strip steak drumstick shank. Short ribs shoulder meatball, rump salami jowl flank ribeye jerky doner shank chicken ham pastrami turkey.";
        $item->imagePath="http://www.cooktube.in/wp-content/uploads/2016/10/Kousa-Mahshi-Lebanese-Stuffed-Zucchini.jpg";
        $item->price=17.49;
        $item->save();


        $item1 = new Recipes;
        $item1->name="Chich Barak";
        $item1->items="Bacon ipsum dolor amet pork belly tri-tip ball tip, kevin pastrami buffalo andouille rump turducken pork chop meatball pork loin. Strip steak andouille buffalo flank, capicola beef kevin pork loin pastrami venison shank rump cow kielbasa. Venison pork chop chicken, porchetta tenderloin burgdoggen sausage ball tip pork shoulder filet mignon meatball short ribs. Beef shank doner, buffalo pork pancetta ground round strip steak tail hamburger short loin pork loin.";
        $item1->description="Venison tenderloin buffalo, chuck t-bone ribeye meatball prosciutto burgdoggen pig jerky landjaeger doner. Kielbasa bresaola picanha venison, cow pancetta turducken jerky tongue. Ribeye pastrami ham hock pork belly meatloaf, capicola short loin swine pork t-bone. T-bone strip steak drumstick shank. Short ribs shoulder meatball, rump salami jowl flank ribeye jerky doner shank chicken ham pastrami turkey.";
        $item1->imagePath="https://img-global.cpcdn.com/001_recipes/11410/751x532cq70/photo.jpg";
        $item1->price=24.99;
        $item1->save();

        $item2 = new Recipes;
        $item2->name="Pasta";
        $item2->items="Bacon ipsum dolor amet pork belly tri-tip ball tip, kevin pastrami buffalo andouille rump turducken pork chop meatball pork loin. Strip steak andouille buffalo flank, capicola beef kevin pork loin pastrami venison shank rump cow kielbasa. Venison pork chop chicken, porchetta tenderloin burgdoggen sausage ball tip pork shoulder filet mignon meatball short ribs. Beef shank doner, buffalo pork pancetta ground round strip steak tail hamburger short loin pork loin.";
        $item2->description="Venison tenderloin buffalo, chuck t-bone ribeye meatball prosciutto burgdoggen pig jerky landjaeger doner. Kielbasa bresaola picanha venison, cow pancetta turducken jerky tongue. Ribeye pastrami ham hock pork belly meatloaf, capicola short loin swine pork t-bone. T-bone strip steak drumstick shank. Short ribs shoulder meatball, rump salami jowl flank ribeye jerky doner shank chicken ham pastrami turkey.";
        $item2->imagePath="https://d2814mmsvlryp1.cloudfront.net/wp-content/uploads/2018/04/WGC-Calabrian-Chili-Pasta-2-copy-2.jpg";
        $item2->price=35;
        $item2->save();


        
    }
}
