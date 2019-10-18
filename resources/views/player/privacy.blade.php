@extends('layouts.app')
@section('content')
    <div class="container-fluid h-100 pt-4 pb-5" id="terms_and_conditions">
        <div class="menu-buttons row justify-content-between">
            <div class="col-auto back-btn">
                <a href="{{ url()->previous() }}" class="btn p-0"><i class="fas fa-angle-left"></i></a>
            </div>
            <div class="col-auto logo text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset("images/menu/logo.svg") }}" alt="logo image">
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <h1 class="text-center my-5">RAEVANT GAMES LIMITED Privacy Policy</h1>
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10" id="scrolled">
                        <p><i>Last Update of Terms and Conditions: 16thOctober 2019</i></p>
                        <p>Welcome to our privacy policy page and cookies page. Here, you can find the information about
                            your data, how we use it, protect it and also information about cookies, their meaning, its
                            usage in our services and your rights regarding your data. Please read this policy carefully and
                            also read the privacy policy of all third parties included.
                        </p>
                        <p>
                            For any queries regarding your data, for example what data we keep or if you want us to
                            remove your data, please contact us at <a href="mailto:data@raevantgames.com">data@raevantgames.com</a>, or at
                            <a href="mailto:help@raevantgames.com">help@raevantgames.com</a> where we will help you get an answer.
                        </p>
                        <div class="my-4">
                            <h4 class="text-center mt-5">Contents</h4>
                            <ol class="ml-5 pl-5">
                                <li>About us</li>
                                <li>Your data and your data’s processing</li>
                                <li>Data protection</li>
                                <li>Controlling your data</li>
                                <li>Minors and young children</li>
                                <li>Cookie policy</li>
                            </ol>
                        </div>
                        <div>
                            <h4 class="text-center mt-5">General Terms and Conditions</h4>
                            <ol class="ml-3">
                                <li>About us
                                    <p>
                                        RAEVANT GAMES LIMITED is a private limited company registered in the United
                                        Kingdom with registration number 12163090.
                                    </p>
                                </li>
                                <li>Your data, data processing and third parties.
                                    <p>
                                        In this privacy policy, the “data” we are referring to means any piece of digital data or
                                        information (a collection of data) that describes you, identifies you or is attributed to
                                        you.
                                    </p>
                                    <p>
                                        RAEVANT GAMES LIMITED requests different types of this data (which would be
                                        considered personal information). In switr.io we request your email address, username
                                        and password only (please refer to the third party login privacy policies in the section
                                        “third party sites and sharing data”).
                                    </p>
                                    <p>
                                        Your password is encrypted in our databases so that even we cannot see what password
                                        you are using. If you forgot your password or feel it has been compromised, please reset
                                        your password.
                                    </p>
                                    <div>
                                        <p>Other types of data include:</p>
                                        <ul class="ml-3" style="list-style-type:disc;">
                                            <li>
                                                Name, age or contact details entered during competitions, promotions or
                                                surveys that we may post;
                                            </li>
                                            <li>
                                                Price (in currency), number of coins, payment method and status of the payment
                                                when you make a purchase of a “virtual item” (please see our Terms and
                                                Conditions for an explanation of virtual items);
                                            </li>
                                            <li>
                                                Any data or information such as conversations or requests made to us on our
                                                emails or to our technical or customer support teams;
                                            </li>
                                            <li>
                                                Any data or information provided in our own forums;
                                            </li>
                                        </ul>
                                    </div>
                                    <p>
                                        Regarding the actual services such as games like switr.io, we also may collect other
                                        types of data on top of the ones mentioned above, whether or not you are logged in to
                                        use our services or not. These include:
                                    </p>
                                    <div>
                                        <ul class="ml-3" style="list-style-type:disc;">
                                            <li>
                                                Game data such as number of kills, time in game, number of switches, XP, level,
                                                number of times you play and general amount of time spent using our services
                                                and any other game feature or functional parameter.
                                            </li>
                                            <li>
                                                Your coin wallet or balance and the transaction history of your profile;
                                            </li>
                                            <li>
                                                Your country and location;
                                            </li>
                                            <li>
                                                Which games you are playing, method of playing games (such as device, browser
                                                version, IP address and so on;
                                            </li>
                                            <li>
                                                Attribution data (which is data or information passed back and forth between
                                                third party websites) including behavioral and usage patterns, advertising ID and
                                                any other advertising tools
                                            </li>
                                            <li>
                                                Third party login providers such as Facebook (facebook.com) or Google
                                                (google.com). Please read their respective Terms and Conditions and Privacy
                                                Policies and Cookie Policies in order to understand the type of data that might be
                                                exchanged between us and these third parties.
                                            </li>
                                        </ul>
                                    </div>
                                    <p>
                                        We use your data to provide a personalized gaming experience for your age, location,
                                        preferences and more. This also includes using your data such as email or phone
                                        number to contact you in case of issues or for promotional or news related purposes.
                                    </p>
                                    <p>
                                        We also use your data to ensure that you are complying with the Terms and Conditions
                                        of our services and to ensure you are protected as a user of our services by restricting
                                        harmful behavior and potentially stemming losses or damages resulting from violating
                                        our terms and conditions or to stop violation of laws or regulations in the country you
                                        are using our services. The ability to protect you from hackers, viruses or harmful events
                                        or bugs also relies on our ability to use data that we have recorded from you and your
                                        experience using our services.
                                    </p>
                                    <p>
                                        We also use data from third party clients such as Facebook and Google for the login
                                        capabilities. This is known as connecting social media accounts
                                    </p>
                                    <p>
                                        We also use your data for personalized advertisements provided to advertising
                                        companies such as Google AdSense. For more information, please refer to the policies
                                        and terms and conditions of Google AdSense at <a
                                            href="https://www.google.com/adsense/new/localizedterms?gsessionid=zCqSzSc8KFvc5hMACvseZJC1Fwq5-rVZ"
                                            target="_blank"
                                        >https://www.google.com/adsense/new/localizedterms?gsessionid=zCqSzSc8KFvc5hMACvseZJC1Fwq5-rVZ
                                        </a>. You can turn off targeted
                                        adverts, however we will still show advertising on website as we choose.
                                    </p>
                                    <p>
                                        Your game or access data (how many times you use our services) may also be recorded
                                        but this is done anonymously. This means that your name or personal detail won’t be in
                                        these statistics, you will just be a figure in our reports or projections. For example, we
                                        may want to know the number people using our services this month; you would part of
                                        that sum.
                                    </p>
                                </li>
                                <li>Data protection
                                    <p>
                                        We only keep the required data that we deem useful. Regarding your personal data
                                        such as name, email and so on, we will keep these so far as our services exist. If you
                                        wish to delete your account and remove your personal details, please contact us on
                                        <a href="mailto:help@raevantgames.com">help@raevantgames.com</a>. Please bear in mind that some transaction histories may be
                                        kept along with your player identification number in case you wish to contact us
                                        regarding transactions in the future (for the time that RAEVANT GAMES LIMITED is
                                        operating).
                                    </p>
                                    <p>
                                        Regarding data protection, we have a strict security measure on our databases and
                                        other sensitive content. All hardware is password protected, firewalls exist on our
                                        servers and access to our databases is under 2 factor authentication. We do not allow
                                        unauthorized access to our data and our servers containing the data are all dedicated.
                                    </p>
                                    <p>
                                        However, please remember that data is only as safe as the transfer method. If you are
                                        transferring data to us (as in entering your information or other data on our sites or
                                        services or support), then we cannot guarantee that the internet transmission will be
                                        secure. Transferring data over the internet is done at your own risk.
                                    </p>
                                    <p>
                                        Regarding sharing your data, other than cookie use in targeted advertising, we won’t
                                        share personal information with other third parties without your prior consent first.
                                        Although we are a UK company, some of your data may be transferred overseas for
                                        example to our servers in the US, the EU and Asia to third party hosting services that
                                        support our services and products.
                                    </p>
                                    <p>
                                        Your data will be protected under the European Economic Area (EEA) requirements, but
                                        please be aware that we cannot guarantee the safety and the transfer safety of files
                                        stemming from security issues of these third party hosting providers. We transfer and
                                        store data in the safest and more reliable methods we can use and meet the
                                        requirements of the EEA and General Data Protection Regulation (GDPR) in the EU.
                                    </p>
                                    <p>
                                        Please find out more information about data transfers here:
                                        <a href="https://ec.europa.eu/info/strategy/justice-and-fundamental-rights/dataprotection_en" target="_blank">
                                            https://ec.europa.eu/info/strategy/justice-and-fundamental-rights/dataprotection_en
                                        </a>.
                                    </p>
                                    <p>
                                        Or if you want to know more about data protection, please see the GDPR website:
                                        <a href="https://eugdpr.org/" target="_blank">https://eugdpr.org/</a>
                                    </p>
                                </li>
                                <li>Controlling your data
                                    <p>
                                        You can request the data we store on you by contacting us at
                                        <a href="mailto:data@raevantgames.com">
                                        data@raevantgames.com</a>.
                                    </p>
                                    <p>
                                        f you need to delete your account you can also contact us on
                                        <a href="mailto:help@raevantgames.com">help@raevantgames.com</a>.
                                    </p>
                                    <p>
                                        You can understand what data we use in the previous sections.
                                    </p>
                                </li>
                                <li>Minors and young children
                                    <p>
                                        As stated in our Terms and Conditions, the minimum age for using our services is 16
                                        years old. However younger children can also use our service if supervised by an adult,
                                        for example a parent or guardian). This is however the responsibility of the supervising
                                        adult to decide if the services we provide (from games to advertising from third parties)
                                        are suitable for the child or minor in question.
                                    </p>
                                    <p>
                                        We believe there is no reason as to why children of any age cannot use our services,
                                        including switr.io since. Also the advertising we show via the third party advertisers will
                                        be mild and not show any content which would be reasonably considered offensive.
                                    </p>
                                    <p>
                                        For parents or guardians or adult supervisors of children, if you require the data we
                                        store on the minor in question, contact us on <a href="mailto:help@raevantgames.com">help@raevantgames.com</a>.
                                    </p>
                                    <p>
                                        For information about internet security, please refer to the website for the Information
                                        Commissioners Office <a href="https://ico.org.uk/" target="_blank">https://ico.org.uk/</a> or your regional or countries data and
                                        information commissions and government agencies to learn more about protecting your
                                        children and minors online.
                                    </p>
                                </li>
                                <li>Cookie policy
                                    <p>
                                        What is a cookie? Well, a cookie is a piece data that is sent from a website over the web
                                        to your computer. This data is stored on your local browser. They are just simple text
                                        files.
                                    </p>
                                    <p>
                                        Why do we use cookies? Simply to store useful information on your browser or to
                                        record your behavior or activities whilst using our services or using your browser
                                    </p>
                                    <p>
                                        Are they bad? Well our cookies aren’t malicious or harmful to your computer, but many
                                        people feel that they are harmful in terms of security. Searches, activities and general
                                        behavior on your browser are recorded and made available for us or other organizations
                                        such as third party advertisers to use.
                                    </p>
                                    <p>
                                        We use cookies for third party advertisers to be able to perform targeted advertising,
                                        meaning to show adverts more suited to what you are generally searching for on the
                                        internet or like to browse. You can turn off targeted advertising in your settings,
                                        however we will still show adverts (although not targeted).
                                    </p>
                                    <p>
                                        These third party advertisers such as Google use cookies on partner sites which we plant
                                        the cookies on your browser. These third party advertisers then use these cookies to
                                        present advertisements to you.
                                    </p>
                                    <p>
                                        <strong>YOU CAN OPT OUT OF ADVERTS FROM THE ADVERTISERS SIDE.</strong> For example, this link
                                        will give a step-by-step on how to do so:
                                        <a href="https://support.google.com/ads/answer/2662922?hl=en" target="_blank">https://support.google.com/ads/answer/2662922?hl=en</a>

                                    </p>
                                    <p>
                                        You can always clear your cookies but it’s different for each browser. Remember that
                                        you generally clear cache AND cookies, meaning other files or images that are stored
                                        (cached) on your local system to make loading sites faster. Don’t delete your saved
                                        passwords!
                                    </p>
                                    <p>
                                        For more information about our advertising vendors, please see more information on
                                        Google AdSense: <a href="https://www.google.com/adsense/start/" target="_blank">
                                            https://www.google.com/adsense/start/
                                        </a>
                                    </p>
                                    <p>
                                        Or see how google uses cookies here:
                                        <a href="https://policies.google.com/technologies/cookies" target="_blank">
                                            https://policies.google.com/technologies/cookies
                                        </a>
                                    </p>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
