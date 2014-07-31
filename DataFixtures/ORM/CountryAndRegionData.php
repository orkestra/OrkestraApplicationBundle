<?php

/*
 * This file is part of the OrkestraApplicationBundle package.
 *
 * Copyright (c) Orkestra Community
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Orkestra\Bundle\ApplicationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Orkestra\Bundle\ApplicationBundle\Entity\Contact\Region;
use Orkestra\Bundle\ApplicationBundle\Entity\Contact\Country;

/**
 * Loads country and region data into the database
 */
class CountryAndRegionData extends AbstractFixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        // Afghanistan
        $country = new Country('Afghanistan', 'AF', 'AFG');
        $country->addRegion(new Region('Badakhshan', 'BAD'));
        $country->addRegion(new Region('Badghis', 'BAH'));
        $country->addRegion(new Region('Baghlan', 'BAG'));
        $country->addRegion(new Region('Balkh', 'BAL'));
        $country->addRegion(new Region('Bamian', 'BAM'));
        $country->addRegion(new Region('Farah', 'FAR'));
        $country->addRegion(new Region('Faryab', 'FAY'));
        $country->addRegion(new Region('Ghazni', 'GHA'));
        $country->addRegion(new Region('Ghowr', 'GHO'));
        $country->addRegion(new Region('Helmand', 'HEL'));
        $country->addRegion(new Region('Herat', 'HER'));
        $country->addRegion(new Region('Jowzjan', 'JOW'));
        $country->addRegion(new Region('Kabol', 'KAB'));
        $country->addRegion(new Region('Kandahar', 'KAN'));
        $country->addRegion(new Region('Kapisa', 'KAP'));
        $country->addRegion(new Region('Khowst', 'KHW'));
        $country->addRegion(new Region('Konar', 'KNR'));
        $country->addRegion(new Region('Kondoz', 'KON'));
        $country->addRegion(new Region('Laghman', 'LAG'));
        $country->addRegion(new Region('Lowgar', 'LOW'));
        $country->addRegion(new Region('Nangarhar', 'NAN'));
        $country->addRegion(new Region('Nimruz', 'NIM'));
        $country->addRegion(new Region('Nurestan', 'NUR'));
        $country->addRegion(new Region('Oruzgan', 'ORU'));
        $country->addRegion(new Region('Paktia', 'PKT'));
        $country->addRegion(new Region('Paktika', 'PAK'));
        $country->addRegion(new Region('Parvan', 'PAR'));
        $country->addRegion(new Region('Samangan', 'SAM'));
        $country->addRegion(new Region('Sar-e', 'Pol'));
        $country->addRegion(new Region('Takhar', 'TAK'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Vardak', 'VAR'));
        $country->addRegion(new Region('Zabol', 'ZAB'));
        $manager->persist($country);

        // Albania
        $country = new Country('Albania', 'AL', 'ALB');
        $country->addRegion(new Region('Beratit', 'BER'));
        $country->addRegion(new Region('Dibres', 'DIB'));
        $country->addRegion(new Region('Durresit', 'DUR'));
        $country->addRegion(new Region('Elbasanit', 'ELB'));
        $country->addRegion(new Region('Fierit', 'FIE'));
        $country->addRegion(new Region('Gjirokastres', 'GJI'));
        $country->addRegion(new Region('Korces', 'KOR'));
        $country->addRegion(new Region('Kukesit', 'KUK'));
        $country->addRegion(new Region('Lezhes', 'LEZ'));
        $country->addRegion(new Region('Shkodres', 'SHK'));
        $country->addRegion(new Region('Tiranes', 'TIR'));
        $country->addRegion(new Region('Vlores', 'VLO'));
        $manager->persist($country);

        // Algeria
        $country = new Country('Algeria', 'DZ', 'DZA');
        $country->addRegion(new Region('Adrar', 'ADR'));
        $country->addRegion(new Region('Ain', 'Def'));
        $country->addRegion(new Region('Ain', 'Tem'));
        $country->addRegion(new Region('Alger', 'ALG'));
        $country->addRegion(new Region('Annaba', 'ANN'));
        $country->addRegion(new Region('Batna', 'BAT'));
        $country->addRegion(new Region('Bechar', 'BEC'));
        $country->addRegion(new Region('Bejaia', 'BEJ'));
        $country->addRegion(new Region('Biskra', 'BIS'));
        $country->addRegion(new Region('Blida', 'BLI'));
        $country->addRegion(new Region('Bordj', 'Bou'));
        $country->addRegion(new Region('Bouira', 'BOU'));
        $country->addRegion(new Region('Chlef', 'CHL'));
        $country->addRegion(new Region('Constantine', 'CON'));
        $country->addRegion(new Region('Djelfa', 'DJE'));
        $country->addRegion(new Region('El', 'Bay'));
        $country->addRegion(new Region('El', 'Oue'));
        $country->addRegion(new Region('Ghardaia', 'GHA'));
        $country->addRegion(new Region('Guelma', 'GUE'));
        $country->addRegion(new Region('Illizi', 'ILL'));
        $country->addRegion(new Region('Jijel', 'JIJ'));
        $country->addRegion(new Region('Khenchela', 'KHE'));
        $country->addRegion(new Region('Laghouat', 'LAG'));
        $country->addRegion(new Region('Mascara', 'MAS'));
        $country->addRegion(new Region('Medea', 'MED'));
        $country->addRegion(new Region('Mila', 'MIL'));
        $country->addRegion(new Region('Mostaganem', 'MOS'));
        $country->addRegion(new Region('Naama', 'NAA'));
        $country->addRegion(new Region('Oran', 'ORA'));
        $country->addRegion(new Region('Ouargla', 'OUA'));
        $country->addRegion(new Region('Oum', 'el'));
        $country->addRegion(new Region('Relizane', 'REL'));
        $country->addRegion(new Region('Saida', 'SAI'));
        $country->addRegion(new Region('Setif', 'SET'));
        $country->addRegion(new Region('Sidi', 'Bel'));
        $country->addRegion(new Region('Skikda', 'SKI'));
        $country->addRegion(new Region('Souk', 'Ahr'));
        $country->addRegion(new Region('Tamanghasset', 'TAM'));
        $country->addRegion(new Region('Tebessa', 'TEB'));
        $country->addRegion(new Region('Tiaret', 'TIA'));
        $country->addRegion(new Region('Tindouf', 'TIN'));
        $country->addRegion(new Region('Tipaza', 'TIP'));
        $country->addRegion(new Region('Tissemsilt', 'TIS'));
        $country->addRegion(new Region('Tizi', 'Ouz'));
        $country->addRegion(new Region('Tlemcen', 'TLE'));
        $manager->persist($country);

        // American Samoa
        $country = new Country('American Samoa', 'AS', 'ASM');
        $country->addRegion(new Region('American Samoa', 'AS'));
        $manager->persist($country);

        // Andorra
        $country = new Country('Andorra', 'AD', 'AND');
        $country->addRegion(new Region('Andorra', 'AND'));
        $manager->persist($country);

        // Angola
        $country = new Country('Angola', 'AO', 'AGO');
        $country->addRegion(new Region('Benguela', 'BEN'));
        $country->addRegion(new Region('Huambo', 'HUA'));
        $country->addRegion(new Region('Luanda', 'LUA'));
        $country->addRegion(new Region('Lunda', 'Sul'));
        $manager->persist($country);

        // Anguilla
        $country = new Country('Anguilla', 'AI', 'AIA');
        $country->addRegion(new Region('Anguilla', 'ANG'));
        $manager->persist($country);

        // Antarctica
        $country = new Country('Antarctica', 'AQ', 'ATA');
        $country->addRegion(new Region('Antarctica', 'ARC'));
        $manager->persist($country);

        // Antigua and Barbuda
        $country = new Country('Antigua and Barbuda', 'AG', 'ATG');
        $manager->persist($country);

        // Argentina
        $country = new Country('Argentina', 'AR', 'ARG');
        $country->addRegion(new Region('Buenos', 'Air'));
        $country->addRegion(new Region('Catamarca', 'CAT'));
        $country->addRegion(new Region('Chaco', 'CHA'));
        $country->addRegion(new Region('Chubut', 'CHU'));
        $country->addRegion(new Region('Cordoba', 'CDB'));
        $country->addRegion(new Region('Corrientes', 'COR'));
        $country->addRegion(new Region('Distrito', 'Fed'));
        $country->addRegion(new Region('Entre', 'Rio'));
        $country->addRegion(new Region('Formosa', 'FOR'));
        $country->addRegion(new Region('Jujuy', 'JUJ'));
        $country->addRegion(new Region('La', 'Pam'));
        $country->addRegion(new Region('La', 'Rio'));
        $country->addRegion(new Region('Mendoza', 'MEN'));
        $country->addRegion(new Region('Misiones', 'MIS'));
        $country->addRegion(new Region('Neuquen', 'NEU'));
        $country->addRegion(new Region('Rio', 'Neg'));
        $country->addRegion(new Region('Salta', 'SAL'));
        $country->addRegion(new Region('San', 'Jua'));
        $country->addRegion(new Region('San', 'Lui'));
        $country->addRegion(new Region('Santa', 'Cru'));
        $country->addRegion(new Region('Santa', 'Fe'));
        $country->addRegion(new Region('Santiago', 'del'));
        $country->addRegion(new Region('Tierra', 'del'));
        $country->addRegion(new Region('Tucuman', 'TUC'));
        $manager->persist($country);

        // Armenia
        $country = new Country('Armenia', 'AM', 'ARM');
        $country->addRegion(new Region('Aragatsotni', 'ARA'));
        $country->addRegion(new Region('Ararati', 'ARR'));
        $country->addRegion(new Region('Armaviri', 'ARM'));
        $country->addRegion(new Region('Kalininskiy', 'Ray'));
        $country->addRegion(new Region('Lorru', 'KAL'));
        $country->addRegion(new Region('Shiraki', 'SHI'));
        $country->addRegion(new Region('Tavushi', 'TAV'));
        $manager->persist($country);

        // Aruba
        $country = new Country('Aruba', 'AW', 'ABW');
        $country->addRegion(new Region('Aruba', 'ARU'));
        $manager->persist($country);

        // Australia
        $country = new Country('Australia', 'AU', 'AUS');
        $country->addRegion(new Region('Australian', 'Cap'));
        $country->addRegion(new Region('New South Wales', 'NS'));
        $country->addRegion(new Region('Northern Territory', 'NT'));
        $country->addRegion(new Region('Queensland', 'QL'));
        $country->addRegion(new Region('South Australia', 'SA'));
        $country->addRegion(new Region('Tasmania', 'TS'));
        $country->addRegion(new Region('Victoria', 'VI'));
        $country->addRegion(new Region('Western Australia', 'WA'));
        $country->addRegion(new Region('Australian Capital Territory', 'CT'));
        $country->addRegion(new Region('New', 'Sou'));
        $country->addRegion(new Region('New', 'Sou'));
        $manager->persist($country);

        // Austria
        $country = new Country('Austria', 'AT', 'AUT');
        $country->addRegion(new Region('Burgenland', 'BUR'));
        $country->addRegion(new Region('Karnten', 'KAR'));
        $country->addRegion(new Region('Niederosterreich', 'NIE'));
        $country->addRegion(new Region('Oberosterreich', 'OBE'));
        $country->addRegion(new Region('Salzburg', 'SAL'));
        $country->addRegion(new Region('Steiermark', 'STE'));
        $country->addRegion(new Region('Tirol', 'TIR'));
        $country->addRegion(new Region('Vorarlberg', 'VOR'));
        $country->addRegion(new Region('Wien', 'WIE'));
        $manager->persist($country);

        // Azerbaijan
        $country = new Country('Azerbaijan', 'AZ', 'AZE');
        $country->addRegion(new Region('Abseron', 'ABS'));
        $country->addRegion(new Region('Agcabadi', 'AGC'));
        $country->addRegion(new Region('Agdam', 'AGM'));
        $country->addRegion(new Region('Agdas', 'AGD'));
        $country->addRegion(new Region('Agstafa', 'AGS'));
        $country->addRegion(new Region('Agsu', 'AGU'));
        $country->addRegion(new Region('Ali', 'Bay'));
        $country->addRegion(new Region('Astara', 'AST'));
        $country->addRegion(new Region('Baki', 'Sah'));
        $country->addRegion(new Region('Balakan', 'BAL'));
        $country->addRegion(new Region('Barda', 'BAR'));
        $country->addRegion(new Region('Beylaqan', 'BEY'));
        $country->addRegion(new Region('Bilasuvar', 'BIL'));
        $country->addRegion(new Region('Cabrayil', 'CAB'));
        $country->addRegion(new Region('Calilabad', 'CAL'));
        $country->addRegion(new Region('Daskasan', 'DAS'));
        $country->addRegion(new Region('Davaci', 'DAV'));
        $country->addRegion(new Region('Fuzuli', 'FUZ'));
        $country->addRegion(new Region('Gadabay', 'GAD'));
        $country->addRegion(new Region('Ganca', 'Sah'));
        $country->addRegion(new Region('Goranboy', 'GOR'));
        $country->addRegion(new Region('Goycay', 'GOY'));
        $country->addRegion(new Region('Haciqabul', 'HAC'));
        $country->addRegion(new Region('Imisli', 'IMI'));
        $country->addRegion(new Region('Ismayilli', 'ISM'));
        $country->addRegion(new Region('Kalbacar', 'KAL'));
        $country->addRegion(new Region('Kurdamir', 'KUR'));
        $country->addRegion(new Region('Lacin', 'LAC'));
        $country->addRegion(new Region('Lankaran', 'LAN'));
        $country->addRegion(new Region('Lankaran', 'Sah'));
        $country->addRegion(new Region('Lerik', 'LER'));
        $country->addRegion(new Region('Masalli', 'MAS'));
        $country->addRegion(new Region('Mingacevir', 'Sah'));
        $country->addRegion(new Region('Naftalan', 'Sah'));
        $country->addRegion(new Region('Naxcivan', 'Mux'));
        $country->addRegion(new Region('Neftcala', 'NEF'));
        $country->addRegion(new Region('Oguz', 'OGU'));
        $country->addRegion(new Region('Qabala', 'QAB'));
        $country->addRegion(new Region('Qax', 'QAX'));
        $country->addRegion(new Region('Qazax', 'QAZ'));
        $country->addRegion(new Region('Qobustan', 'QOB'));
        $country->addRegion(new Region('Quba', 'QUB'));
        $country->addRegion(new Region('Qubadli', 'QUL'));
        $country->addRegion(new Region('Qusar', 'QUS'));
        $country->addRegion(new Region('Saatli', 'SAA'));
        $country->addRegion(new Region('Sabirabad', 'SAB'));
        $country->addRegion(new Region('Saki', 'SAK'));
        $country->addRegion(new Region('Saki', 'Sah'));
        $country->addRegion(new Region('Salyan', 'SAL'));
        $country->addRegion(new Region('Samaxi', 'SAM'));
        $country->addRegion(new Region('Samkir', 'SAR'));
        $country->addRegion(new Region('Samux', 'SAX'));
        $country->addRegion(new Region('Siyazan', 'SIY'));
        $country->addRegion(new Region('Susa', 'SUR'));
        $country->addRegion(new Region('Tartar', 'TAR'));
        $country->addRegion(new Region('Tovuz', 'TOV'));
        $country->addRegion(new Region('Ucar', 'UCA'));
        $country->addRegion(new Region('Xacmaz', 'XAC'));
        $country->addRegion(new Region('Xankandi', 'Sah'));
        $country->addRegion(new Region('Xanlar', 'XAL'));
        $country->addRegion(new Region('Xizi', 'XIZ'));
        $country->addRegion(new Region('Xocali', 'XOC'));
        $country->addRegion(new Region('Xocavand', 'XOV'));
        $country->addRegion(new Region('Yardimli', 'YAR'));
        $country->addRegion(new Region('Yevlax', 'YEV'));
        $country->addRegion(new Region('Yevlax', 'Sah'));
        $country->addRegion(new Region('Zangilan', 'ZAN'));
        $country->addRegion(new Region('Zaqatala', 'ZAQ'));
        $country->addRegion(new Region('Zardab', 'ZAR'));
        $manager->persist($country);

        // Bahamas
        $country = new Country('Bahamas', 'BS', 'BHS');
        $country->addRegion(new Region('Abaco', 'ABA'));
        $country->addRegion(new Region('Andros', 'AND'));
        $country->addRegion(new Region('Bimini', 'Isl'));
        $country->addRegion(new Region('Cat', 'Isl'));
        $country->addRegion(new Region('Eleuthera', 'ELE'));
        $country->addRegion(new Region('Exuma', '&'));
        $country->addRegion(new Region('Grand', 'Bah'));
        $country->addRegion(new Region('Harbour', 'Isl'));
        $country->addRegion(new Region('Inagua', 'INA'));
        $country->addRegion(new Region('Long', 'Isl'));
        $country->addRegion(new Region('Mayaguana', 'MAY'));
        $country->addRegion(new Region('New', 'Pro'));
        $country->addRegion(new Region('Ragged', 'Isl'));
        $manager->persist($country);

        // Bahrain
        $country = new Country('Bahrain', 'BH', 'BHR');
        $country->addRegion(new Region('Al', 'Had'));
        $country->addRegion(new Region('Al', 'Man'));
        $country->addRegion(new Region('Al', 'Min'));
        $country->addRegion(new Region('Al', 'Min'));
        $country->addRegion(new Region('Al', 'Min'));
        $country->addRegion(new Region('Al', 'Muh'));
        $country->addRegion(new Region('Ar', 'Rif'));
        $country->addRegion(new Region('Jidd', 'Haf'));
        $country->addRegion(new Region('Madinat', 'Ham'));
        $country->addRegion(new Region('Madinat', '`Is'));
        $country->addRegion(new Region('Mintaqat', 'Juz'));
        $country->addRegion(new Region('Sitrah', 'SIT'));
        $manager->persist($country);

        // Bangladesh
        $country = new Country('Bangladesh', 'BD', 'BGD');
        $country->addRegion(new Region('Chittagong', 'CHI'));
        $country->addRegion(new Region('Dhaka', 'DHA'));
        $country->addRegion(new Region('Khulna', 'KHU'));
        $country->addRegion(new Region('Rajshahi', 'RAJ'));
        $manager->persist($country);

        // Barbados
        $country = new Country('Barbados', 'BB', 'BRB');
        $country->addRegion(new Region('Christ', 'Chu'));
        $country->addRegion(new Region('Saint', 'And'));
        $country->addRegion(new Region('Saint', 'Geo'));
        $country->addRegion(new Region('Saint', 'Jam'));
        $country->addRegion(new Region('Saint', 'Joh'));
        $country->addRegion(new Region('Saint', 'Jos'));
        $country->addRegion(new Region('Saint', 'Luc'));
        $country->addRegion(new Region('Saint', 'Mic'));
        $country->addRegion(new Region('Saint', 'Pet'));
        $country->addRegion(new Region('Saint', 'Phi'));
        $country->addRegion(new Region('Saint', 'Tho'));
        $manager->persist($country);

        // Belarus
        $country = new Country('Belarus', 'BY', 'BLR');
        $country->addRegion(new Region('Brestskaya', 'BRE'));
        $country->addRegion(new Region('Hrodzyenskaya', 'HRO'));
        $country->addRegion(new Region('Mahilyowskaya', 'MAH'));
        $country->addRegion(new Region('Minskaya', 'MIN'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Vitsyebskaya', 'VIT'));
        $manager->persist($country);

        // Belgium
        $country = new Country('Belgium', 'BE', 'BEL');
        $country->addRegion(new Region('Antwerpen', 'ANT'));
        $country->addRegion(new Region('Hainaut', 'HAI'));
        $country->addRegion(new Region('Liege', 'LIE'));
        $country->addRegion(new Region('Limburg', 'LIM'));
        $country->addRegion(new Region('Luxembourg', 'LUX'));
        $country->addRegion(new Region('Namur', 'NAM'));
        $country->addRegion(new Region('Oost-Vlaanderen', 'OOV'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('West-Vlaanderen', 'WEV'));
        $manager->persist($country);

        // Belize
        $country = new Country('Belize', 'BZ', 'BLZ');
        $country->addRegion(new Region('Belize', 'BEL'));
        $country->addRegion(new Region('Cayo', 'CAY'));
        $country->addRegion(new Region('Corozal', 'COR'));
        $country->addRegion(new Region('Orange', 'Wal'));
        $country->addRegion(new Region('Stann', 'Cre'));
        $country->addRegion(new Region('Toledo', 'TOL'));
        $manager->persist($country);

        // Benin
        $country = new Country('Benin', 'BJ', 'BEN');
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Bermuda
        $country = new Country('Bermuda', 'BM', 'BMU');
        $country->addRegion(new Region('Devonshire', 'DEV'));
        $country->addRegion(new Region('Hamilton', 'HAM'));
        $country->addRegion(new Region('Paget', 'PAG'));
        $country->addRegion(new Region('Pembroke', 'PEM'));
        $country->addRegion(new Region('Saint', 'Geo'));
        $country->addRegion(new Region('Sandys', 'SAN'));
        $country->addRegion(new Region('Smiths', 'SMI'));
        $country->addRegion(new Region('Southampton', 'SOU'));
        $country->addRegion(new Region('Warwick', 'WAR'));
        $manager->persist($country);

        // Bhutan
        $country = new Country('Bhutan', 'BT', 'BTN');
        $country->addRegion(new Region('Bhutan', 'BHU'));
        $manager->persist($country);

        // Bolivia
        $country = new Country('Bolivia', 'BO', 'BOL');
        $country->addRegion(new Region('Beni', 'BEN'));
        $country->addRegion(new Region('Chuquisaca', 'CHU'));
        $country->addRegion(new Region('Cochabamba', 'COC'));
        $country->addRegion(new Region('La', 'Paz'));
        $country->addRegion(new Region('Oruro', 'ORU'));
        $country->addRegion(new Region('Pando', 'PAN'));
        $country->addRegion(new Region('Potosi', 'POT'));
        $country->addRegion(new Region('Santa', 'Cru'));
        $country->addRegion(new Region('Tarija', 'TAR'));
        $manager->persist($country);

        // Bosnia and Herzegowina
        $country = new Country('Bosnia and Herzegowina', 'BA', 'BIH');
        $manager->persist($country);

        // Botswana
        $country = new Country('Botswana', 'BW', 'BWA');
        $country->addRegion(new Region('Gaborone', 'GAB'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Bouvet Island
        $country = new Country('Bouvet Island', 'BV', 'BVT');
        $manager->persist($country);

        // Brazil
        $country = new Country('Brazil', 'BR', 'BRA');
        $country->addRegion(new Region('Acre', 'AC'));
        $country->addRegion(new Region('Alagoas', 'AL'));
        $country->addRegion(new Region('Amapa', 'AP'));
        $country->addRegion(new Region('Amazonas', 'AM'));
        $country->addRegion(new Region('Bahia', 'BA'));
        $country->addRegion(new Region('Ceara', 'CE'));
        $country->addRegion(new Region('Distrito Federal', 'DF'));
        $country->addRegion(new Region('Espirito Santo', 'ES'));
        $country->addRegion(new Region('Goias', 'GO'));
        $country->addRegion(new Region('Maranhao', 'MA'));
        $country->addRegion(new Region('Mato Grosso', 'MT'));
        $country->addRegion(new Region('Mato Gross do Sul', 'MS'));
        $country->addRegion(new Region('Minas Gerais', 'MG'));
        $country->addRegion(new Region('Para', 'PA'));
        $country->addRegion(new Region('Paraiba', 'PB'));
        $country->addRegion(new Region('Parana', 'PR'));
        $country->addRegion(new Region('Pernambuco', 'PE'));
        $country->addRegion(new Region('Piaui', 'PI'));
        $country->addRegion(new Region('Rio de Janeiro', 'RJ'));
        $country->addRegion(new Region('Rio Grande do Norte', 'RN'));
        $country->addRegion(new Region('Rio Grande do Sul', 'RS'));
        $country->addRegion(new Region('Rondonia', 'RO'));
        $country->addRegion(new Region('Roraima', 'RR'));
        $country->addRegion(new Region('Santa Catarina', 'SC'));
        $country->addRegion(new Region('Sao Paulo', 'SP'));
        $country->addRegion(new Region('Sergipe', 'SE'));
        $country->addRegion(new Region('Tocantins', 'TO'));
        $manager->persist($country);

        // British Indian Ocean Territory
        $country = new Country('British Indian Ocean Territory', 'IO', 'IOT');
        $manager->persist($country);

        // Brunei Darussalam
        $country = new Country('Brunei Darussalam', 'BN', 'BRN');
        $country->addRegion(new Region('Brunei', 'BRU'));
        $country->addRegion(new Region('Burundi', 'BUR'));
        $manager->persist($country);

        // Bulgaria
        $country = new Country('Bulgaria', 'BG', 'BGR');
        $country->addRegion(new Region('Blagoevgrad', 'BLA'));
        $country->addRegion(new Region('Burgas', 'BUR'));
        $country->addRegion(new Region('Dobrich', 'DOB'));
        $country->addRegion(new Region('Gabrovo', 'GAB'));
        $country->addRegion(new Region('Khaskovo', 'KHA'));
        $country->addRegion(new Region('Kurdzhali', 'KUR'));
        $country->addRegion(new Region('Kyustendil', 'KYU'));
        $country->addRegion(new Region('Lovech', 'LOV'));
        $country->addRegion(new Region('Montana', 'MON'));
        $country->addRegion(new Region('Pazardzhik', 'PAZ'));
        $country->addRegion(new Region('Pernik', 'PER'));
        $country->addRegion(new Region('Pleven', 'PLE'));
        $country->addRegion(new Region('Plovdiv', 'PLO'));
        $country->addRegion(new Region('Razgrad', 'RAZ'));
        $country->addRegion(new Region('Ruse', 'RUS'));
        $country->addRegion(new Region('Shumen', 'SHU'));
        $country->addRegion(new Region('Silistra', 'SIL'));
        $country->addRegion(new Region('Sliven', 'SLI'));
        $country->addRegion(new Region('Smolyan', 'SMO'));
        $country->addRegion(new Region('Sofiya', 'SOF'));
        $country->addRegion(new Region('Sofiya-Grad', 'SFG'));
        $country->addRegion(new Region('Stara', 'Zag'));
        $country->addRegion(new Region('Turgovishte', 'TUR'));
        $country->addRegion(new Region('Varna', 'VAR'));
        $country->addRegion(new Region('Veliko', 'Tur'));
        $country->addRegion(new Region('Vidin', 'VID'));
        $country->addRegion(new Region('Vratsa', 'VRA'));
        $country->addRegion(new Region('Yambol', 'YAM'));
        $manager->persist($country);

        // Burkina Faso
        $country = new Country('Burkina Faso', 'BF', 'BFA');
        $manager->persist($country);

        // Burundi
        $country = new Country('Burundi', 'BI', 'BDI');
        $manager->persist($country);

        // Cambodia
        $country = new Country('Cambodia', 'KH', 'KHM');
        $country->addRegion(new Region('Batdambang', 'BAT'));
        $country->addRegion(new Region('Kampong', 'Cha'));
        $country->addRegion(new Region('Kampong', 'Chh'));
        $country->addRegion(new Region('Kampong', 'Spo'));
        $country->addRegion(new Region('Kampong', 'Thu'));
        $country->addRegion(new Region('Kampot', 'KAM'));
        $country->addRegion(new Region('Kandal', 'KAN'));
        $country->addRegion(new Region('Kaoh', 'Kon'));
        $country->addRegion(new Region('Kracheh', 'KRA'));
        $country->addRegion(new Region('Mondol', 'Kir'));
        $country->addRegion(new Region('Pouthisat', 'POU'));
        $country->addRegion(new Region('Preah', 'Vih'));
        $country->addRegion(new Region('Prey', 'Ven'));
        $country->addRegion(new Region('Rotanah', 'Kir'));
        $country->addRegion(new Region('Siem', 'Rea'));
        $country->addRegion(new Region('Stoeng', 'Tre'));
        $country->addRegion(new Region('Svay', 'Rie'));
        $country->addRegion(new Region('Takev', 'TAK'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Cameroon
        $country = new Country('Cameroon', 'CM', 'CMR');
        $country->addRegion(new Region('Cameroon', 'CAM'));
        $manager->persist($country);

        // Canada
        $country = new Country('Canada', 'CA', 'CAN');
        $country->addRegion(new Region('Alberta', 'AB'));
        $country->addRegion(new Region('British Columbia', 'BC'));
        $country->addRegion(new Region('Manitoba', 'MB'));
        $country->addRegion(new Region('New Brunswick', 'NB'));
        $country->addRegion(new Region('Newfoundland and Labrador', 'NL'));
        $country->addRegion(new Region('Northwest Territories', 'NT'));
        $country->addRegion(new Region('Nova Scotia', 'NS'));
        $country->addRegion(new Region('Nunavut', 'NU'));
        $country->addRegion(new Region('Ontario', 'ON'));
        $country->addRegion(new Region('Prince Edward Island', 'PE'));
        $country->addRegion(new Region('Quebec', 'QC'));
        $country->addRegion(new Region('Saskatchewan', 'SK'));
        $country->addRegion(new Region('Yukon', 'YT'));
        $manager->persist($country);

        // Cape Verde
        $country = new Country('Cape Verde', 'CV', 'CPV');
        $manager->persist($country);

        // Cayman Islands
        $country = new Country('Cayman Islands', 'KY', 'CYM');
        $manager->persist($country);

        // Central African Republic
        $country = new Country('Central African Republic', 'CF', 'CAF');
        $manager->persist($country);

        // Chad
        $country = new Country('Chad', 'TD', 'TCD');
        $country->addRegion(new Region('Batha', 'BAT'));
        $country->addRegion(new Region('Biltine', 'BIL'));
        $country->addRegion(new Region('Borkou-Ennedi-Tibesti', 'BET'));
        $country->addRegion(new Region('Chari-Baguirmi', 'CHB'));
        $country->addRegion(new Region('Guera', 'GUE'));
        $country->addRegion(new Region('Kanem', 'KAN'));
        $country->addRegion(new Region('Lac', 'LAC'));
        $country->addRegion(new Region('Logone', 'Occ'));
        $country->addRegion(new Region('Logone', 'Ori'));
        $country->addRegion(new Region('Mayo-Kebbi', 'MAK'));
        $country->addRegion(new Region('Moyen-Chari', 'MOC'));
        $country->addRegion(new Region('Ouaddai', 'OUA'));
        $country->addRegion(new Region('Salamat', 'SAL'));
        $country->addRegion(new Region('Tandjile', 'TAN'));
        $manager->persist($country);

        // Chile
        $country = new Country('Chile', 'CL', 'CHL');
        $country->addRegion(new Region('Aisen', 'del'));
        $country->addRegion(new Region('Antofagasta', 'ANT'));
        $country->addRegion(new Region('Araucania', 'ARA'));
        $country->addRegion(new Region('Atacama', 'ATA'));
        $country->addRegion(new Region('Bio-Bio', 'BIO'));
        $country->addRegion(new Region('Coquimbo', 'COQ'));
        $country->addRegion(new Region('Libertador', 'G.B'));
        $country->addRegion(new Region('Los', 'Lag'));
        $country->addRegion(new Region('Magallanes', 'y'));
        $country->addRegion(new Region('Maule', 'MAU'));
        $country->addRegion(new Region('Region', 'Met'));
        $country->addRegion(new Region('Tarapaca', 'TAR'));
        $country->addRegion(new Region('Valparaiso', 'VAL'));
        $manager->persist($country);

        // China
        $country = new Country('China', 'CN', 'CHN');
        $country->addRegion(new Region('Anhui', 'ANH'));
        $country->addRegion(new Region('Beijing', 'Shi'));
        $country->addRegion(new Region('Chongqing', 'Shi'));
        $country->addRegion(new Region('Fujian', 'FUJ'));
        $country->addRegion(new Region('Gansu', 'GAN'));
        $country->addRegion(new Region('Guangdong', 'GUA'));
        $country->addRegion(new Region('Guangxi', 'Zhu'));
        $country->addRegion(new Region('Guizhou', 'GUI'));
        $country->addRegion(new Region('Hainan', 'HAI'));
        $country->addRegion(new Region('Hebei', 'HEB'));
        $country->addRegion(new Region('Heilongjiang', 'HEI'));
        $country->addRegion(new Region('Henan', 'HEN'));
        $country->addRegion(new Region('Hubei', 'HUB'));
        $country->addRegion(new Region('Hunan', 'HUN'));
        $country->addRegion(new Region('Inner', 'Mon'));
        $country->addRegion(new Region('Jiangsu', 'JIU'));
        $country->addRegion(new Region('Jiangxi', 'JII'));
        $country->addRegion(new Region('Jilin', 'JIN'));
        $country->addRegion(new Region('Liaoning', 'LIA'));
        $country->addRegion(new Region('Ningxia', 'Hui'));
        $country->addRegion(new Region('Qinghai', 'QIN'));
        $country->addRegion(new Region('Shaanxi', 'SHX'));
        $country->addRegion(new Region('Shandong', 'SHG'));
        $country->addRegion(new Region('Shanxi', 'SHI'));
        $country->addRegion(new Region('Sichuan', 'SIC'));
        $country->addRegion(new Region('Tibet', 'TIB'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Xinjiang', 'Uyg'));
        $country->addRegion(new Region('Yunnan', 'YUN'));
        $country->addRegion(new Region('Zhejiang', 'ZHE'));
        $manager->persist($country);

        // Christmas Island
        $country = new Country('Christmas Island', 'CX', 'CXR');
        $manager->persist($country);

        // Cocos (Keeling) Islands
        $country = new Country('Cocos (Keeling) Islands', 'CC', 'CCK');
        $manager->persist($country);

        // Colombia
        $country = new Country('Colombia', 'CO', 'COL');
        $country->addRegion(new Region('Antioquia', 'ANT'));
        $country->addRegion(new Region('Atlantico', 'ALT'));
        $country->addRegion(new Region('Bogota', 'BOG'));
        $country->addRegion(new Region('Bolivar', 'BOL'));
        $country->addRegion(new Region('Cauca', 'CAU'));
        $country->addRegion(new Region('Cundinamarca', 'CUN'));
        $country->addRegion(new Region('Magdalena', 'MAG'));
        $country->addRegion(new Region('Meta', 'MET'));
        $country->addRegion(new Region('Santander', 'SAN'));
        $country->addRegion(new Region('Valle', 'del'));
        $manager->persist($country);

        // Comoros
        $country = new Country('Comoros', 'KM', 'COM');
        $country->addRegion(new Region('Comoros', 'COM'));
        $manager->persist($country);

        // Congo
        $country = new Country('Congo', 'CG', 'COG');
        $country->addRegion(new Region('Bouenza', 'BOU'));
        $country->addRegion(new Region('Brazzaville', 'BRA'));
        $country->addRegion(new Region('Cuvette', 'CUV'));
        $country->addRegion(new Region('Kouilou', 'KOU'));
        $country->addRegion(new Region('Lekoumou', 'LEK'));
        $country->addRegion(new Region('Likouala', 'LIK'));
        $country->addRegion(new Region('Niari', 'NIA'));
        $country->addRegion(new Region('Plateaux', 'PLA'));
        $country->addRegion(new Region('Pool', 'POO'));
        $country->addRegion(new Region('Sangha', 'SAN'));
        $manager->persist($country);

        // Cook Islands
        $country = new Country('Cook Islands', 'CK', 'COK');
        $manager->persist($country);

        // Costa Rica
        $country = new Country('Costa Rica', 'CR', 'CRI');
        $manager->persist($country);

        // Cote D'Ivoire
        $country = new Country('Cote D\'Ivoire', 'CI', 'CIV');
        $manager->persist($country);

        // Croatia
        $country = new Country('Croatia', 'HR', 'HRV');
        $country->addRegion(new Region('Bjelovarsko-Bilogorska', 'BJE'));
        $country->addRegion(new Region('Brodsko-Posavska', 'BRO'));
        $country->addRegion(new Region('Dubrovacko-Neretvanska', 'DUB'));
        $country->addRegion(new Region('Grad', 'Zag'));
        $country->addRegion(new Region('Istarska', 'IST'));
        $country->addRegion(new Region('Karlovacka', 'KAR'));
        $country->addRegion(new Region('Koprivnicko-Krizevacka', 'KOP'));
        $country->addRegion(new Region('Krapinsko-Zagorska', 'KRA'));
        $country->addRegion(new Region('Licko-Senjska', 'LIC'));
        $country->addRegion(new Region('Medimurska', 'MED'));
        $country->addRegion(new Region('Osjecko-Baranjska', 'OSJ'));
        $country->addRegion(new Region('Pozesko-Slavonska', 'POZ'));
        $country->addRegion(new Region('Primorsko-Goranska', 'PRI'));
        $country->addRegion(new Region('Sibensko-Kninska', 'SIB'));
        $country->addRegion(new Region('Sisacko-Moslavacka', 'SIS'));
        $country->addRegion(new Region('Splitsko-Dalmatinska', 'SPL'));
        $country->addRegion(new Region('Varazdinska', 'VAR'));
        $country->addRegion(new Region('Viroviticko-Podravska', 'VIR'));
        $country->addRegion(new Region('Vukovarsko-Srijemska', 'VUK'));
        $country->addRegion(new Region('Zagrebacka', 'ZAG'));
        $manager->persist($country);

        // Cuba
        $country = new Country('Cuba', 'CU', 'CUB');
        $country->addRegion(new Region('Camaguey', 'CAM'));
        $country->addRegion(new Region('Ciego', 'de'));
        $country->addRegion(new Region('Cienfuegos', 'CIE'));
        $country->addRegion(new Region('Ciudad', 'de'));
        $country->addRegion(new Region('Granma', 'GRA'));
        $country->addRegion(new Region('Guantanamo', 'GUA'));
        $country->addRegion(new Region('Holguin', 'HOL'));
        $country->addRegion(new Region('Isla', 'de'));
        $country->addRegion(new Region('La', 'Hab'));
        $country->addRegion(new Region('Las', 'Tun'));
        $country->addRegion(new Region('Matanzas', 'MAT'));
        $country->addRegion(new Region('Pinar', 'del'));
        $country->addRegion(new Region('Sancti', 'Spi'));
        $country->addRegion(new Region('Santiago', 'de'));
        $country->addRegion(new Region('Villa', 'Cla'));
        $manager->persist($country);

        // Cyprus
        $country = new Country('Cyprus', 'CY', 'CYP');
        $country->addRegion(new Region('Cyprus', 'CYP'));
        $manager->persist($country);

        // Czech Republic
        $country = new Country('Czech Republic', 'CZ', 'CZE');
        $manager->persist($country);

        // Denmark
        $country = new Country('Denmark', 'DK', 'DNK');
        $country->addRegion(new Region('Arhus', 'Amt'));
        $country->addRegion(new Region('Bornholms', 'Amt'));
        $country->addRegion(new Region('Frederiksberg', 'Kom'));
        $country->addRegion(new Region('Frederiksborg', 'Amt'));
        $country->addRegion(new Region('Fyns', 'Amt'));
        $country->addRegion(new Region('Kobenhavns', 'Amt'));
        $country->addRegion(new Region('Kobenhavns', 'Kom'));
        $country->addRegion(new Region('Nordjyllands', 'Amt'));
        $country->addRegion(new Region('Ribe', 'Amt'));
        $country->addRegion(new Region('Ringkobing', 'Amt'));
        $country->addRegion(new Region('Roskilde', 'Amt'));
        $country->addRegion(new Region('Sonderjyllands', 'Amt'));
        $country->addRegion(new Region('Storstroms', 'Amt'));
        $country->addRegion(new Region('Vejle', 'Amt'));
        $country->addRegion(new Region('Vestsjaellands', 'Amt'));
        $country->addRegion(new Region('Viborg', 'Amt'));
        $manager->persist($country);

        // Djibouti
        $country = new Country('Djibouti', 'DJ', 'DJI');
        $country->addRegion(new Region('Djibouti', 'DJI'));
        $manager->persist($country);

        // Dominica
        $country = new Country('Dominica', 'DM', 'DMA');
        $country->addRegion(new Region('Dominica', 'DOM'));
        $manager->persist($country);

        // Dominican Republic
        $country = new Country('Dominican Republic', 'DO', 'DOM');
        $manager->persist($country);

        // East Timor
        $country = new Country('East Timor', 'TP', 'TMP');
        $manager->persist($country);

        // Ecuador
        $country = new Country('Ecuador', 'EC', 'ECU');
        $country->addRegion(new Region('Azuay', 'AZU'));
        $country->addRegion(new Region('Boliar', 'BOL'));
        $country->addRegion(new Region('Canar', 'CAN'));
        $country->addRegion(new Region('Carchi', 'CAR'));
        $country->addRegion(new Region('Chimborazo', 'CHI'));
        $country->addRegion(new Region('Cotopaxi', 'COT'));
        $country->addRegion(new Region('El', 'Oro'));
        $country->addRegion(new Region('Esmeraldas', 'ESM'));
        $country->addRegion(new Region('Galapagos', 'GAL'));
        $country->addRegion(new Region('Guayas', 'GUA'));
        $country->addRegion(new Region('Imbabura', 'IMB'));
        $country->addRegion(new Region('Loja', 'LOJ'));
        $country->addRegion(new Region('Los', 'Rio'));
        $country->addRegion(new Region('Manabi', 'MAN'));
        $country->addRegion(new Region('Morona-Santiago', 'MSA'));
        $country->addRegion(new Region('Napo', 'NAP'));
        $country->addRegion(new Region('Orellana', 'ORE'));
        $country->addRegion(new Region('Pastaza', 'PAS'));
        $country->addRegion(new Region('Pichincha', 'PIC'));
        $country->addRegion(new Region('Sucumbios', 'SUC'));
        $country->addRegion(new Region('Zamora-Chinchipe', 'ZCH'));
        $manager->persist($country);

        // Egypt
        $country = new Country('Egypt', 'EG', 'EGY');
        $country->addRegion(new Region('Ad-Daqahiyah', 'DAQ'));
        $country->addRegion(new Region('Al-Bahr', 'al-'));
        $country->addRegion(new Region('Al-Buhayrah', 'BUH'));
        $country->addRegion(new Region('Al-Fayyum', 'FAY'));
        $country->addRegion(new Region('Al-Gharbiyah', 'GHA'));
        $country->addRegion(new Region('Al-Iskandariyah', 'ISK'));
        $country->addRegion(new Region('Al-Jizah', 'JIZ'));
        $country->addRegion(new Region('Al-Minufiyah', 'MNF'));
        $country->addRegion(new Region('Al-Minya', 'MIN'));
        $country->addRegion(new Region('Al-Qahirah', 'QAH'));
        $country->addRegion(new Region('Al-Qalyubyah', 'QAL'));
        $country->addRegion(new Region('Al-Wadi', 'al-'));
        $country->addRegion(new Region('As-Suways', 'SUW'));
        $country->addRegion(new Region('Ash-Sharqiyah', 'SHA'));
        $country->addRegion(new Region('Aswan', 'ASW'));
        $country->addRegion(new Region('Asyut', 'ASY'));
        $country->addRegion(new Region('Bani', 'Suw'));
        $country->addRegion(new Region('Dumyat', 'DUM'));
        $country->addRegion(new Region('Kafr', 'ash'));
        $country->addRegion(new Region('Marsa', 'Mat'));
        $country->addRegion(new Region('Qina', 'QIN'));
        $country->addRegion(new Region('Sawhaj', 'SAW'));
        $manager->persist($country);

        // El Salvador
        $country = new Country('El Salvador', 'SV', 'SLV');
        $manager->persist($country);

        // Equatorial Guinea
        $country = new Country('Equatorial Guinea', 'GQ', 'GNQ');
        $manager->persist($country);

        // Eritrea
        $country = new Country('Eritrea', 'ER', 'ERI');
        $country->addRegion(new Region('Eritrea', 'ERI'));
        $manager->persist($country);

        // Estonia
        $country = new Country('Estonia', 'EE', 'EST');
        $country->addRegion(new Region('Estonia', 'EST'));
        $manager->persist($country);

        // Ethiopia
        $country = new Country('Ethiopia', 'ET', 'ETH');
        $country->addRegion(new Region('Ethiopia', 'ETH'));
        $manager->persist($country);

        // Falkland Islands (Malvinas)
        $country = new Country('Falkland Islands (Malvinas)', 'FK', 'FLK');
        $manager->persist($country);

        // Faroe Islands
        $country = new Country('Faroe Islands', 'FO', 'FRO');
        $manager->persist($country);

        // Fiji
        $country = new Country('Fiji', 'FJ', 'FJI');
        $country->addRegion(new Region('Fiji', 'FIJ'));
        $manager->persist($country);

        // Finland
        $country = new Country('Finland', 'FI', 'FIN');
        $country->addRegion(new Region('Alands', 'Lan'));
        $country->addRegion(new Region('Lapplands', 'Lan'));
        $country->addRegion(new Region('Ostra', 'Fin'));
        $country->addRegion(new Region('Sodra', 'Fin'));
        $country->addRegion(new Region('Uleaborgs', 'Lan'));
        $country->addRegion(new Region('Vastra', 'Fin'));
        $manager->persist($country);

        // France
        $country = new Country('France', 'FR', 'FRA');
        $country->addRegion(new Region('Alsace', 'ALS'));
        $country->addRegion(new Region('Aquitaine', 'AQU'));
        $country->addRegion(new Region('Auvergne', 'AUV'));
        $country->addRegion(new Region('Basse-Normandie', 'BAS'));
        $country->addRegion(new Region('Bourgogne', 'BOU'));
        $country->addRegion(new Region('Bretagne', 'BRE'));
        $country->addRegion(new Region('Centre', 'CEN'));
        $country->addRegion(new Region('Champagne-Ardenne', 'CHA'));
        $country->addRegion(new Region('Corse', 'COR'));
        $country->addRegion(new Region('Franche-Comte', 'FRA'));
        $country->addRegion(new Region('Haute-Normandie', 'HAU'));
        $country->addRegion(new Region('Ile-de-France', 'ILE'));
        $country->addRegion(new Region('Languedoc-Roussillon', 'LAN'));
        $country->addRegion(new Region('Limousin', 'LIM'));
        $country->addRegion(new Region('Lorraine', 'LOR'));
        $country->addRegion(new Region('Midi-Pyrenees', 'MID'));
        $country->addRegion(new Region('Nord-Pas-de-Calais', 'NOR'));
        $country->addRegion(new Region('Pays-de-la', 'Loi'));
        $country->addRegion(new Region('Picardie', 'PIC'));
        $country->addRegion(new Region('Poitou-Charentes', 'POI'));
        $country->addRegion(new Region('Rhooe-Alpes', 'RHO'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // France, Metropolitan
        $country = new Country('France, Metropolitan', 'FX', 'FXX');
        $manager->persist($country);

        // French Guiana
        $country = new Country('French Guiana', 'GF', 'GUF');
        $manager->persist($country);

        // French Polynesia
        $country = new Country('French Polynesia', 'PF', 'PYF');
        $manager->persist($country);

        // French Southern Territories
        $country = new Country('French Southern Territories', 'TF', 'ATF');
        $manager->persist($country);

        // Gabon
        $country = new Country('Gabon', 'GA', 'GAB');
        $country->addRegion(new Region('Gabon', 'GAB'));
        $manager->persist($country);

        // Gambia
        $country = new Country('Gambia', 'GM', 'GMB');
        $country->addRegion(new Region('Gambia', 'GAM'));
        $manager->persist($country);

        // Georgia
        $country = new Country('Georgia', 'GE', 'GEO');
        $country->addRegion(new Region('Georgia', 'GEO'));
        $manager->persist($country);

        // Germany
        $country = new Country('Germany', 'DE', 'DEU');
        $country->addRegion(new Region('Baden-Wurttemberg', 'BW'));
        $country->addRegion(new Region('Bayern', 'BY'));
        $country->addRegion(new Region('Berlin', 'BE'));
        $country->addRegion(new Region('Brandenburg', 'BB'));
        $country->addRegion(new Region('Bremen', 'HB'));
        $country->addRegion(new Region('Hamburg', 'HH'));
        $country->addRegion(new Region('Hessen', 'HE'));
        $country->addRegion(new Region('Mecklenburg-Vorpommern', 'MV'));
        $country->addRegion(new Region('Niedersachsen', 'NI'));
        $country->addRegion(new Region('Nordrhein-Westfalen', 'NW'));
        $country->addRegion(new Region('Rheinland-Pfalz', 'RP'));
        $country->addRegion(new Region('Saarland', 'SL'));
        $country->addRegion(new Region('Sachsen', 'SN'));
        $country->addRegion(new Region('Sachsen-Anhalt', 'ST'));
        $country->addRegion(new Region('Schleswig-Holstein', 'SH'));
        $country->addRegion(new Region('Thuringen', 'TH'));
        $manager->persist($country);

        // Ghana
        $country = new Country('Ghana', 'GH', 'GHA');
        $country->addRegion(new Region('Ghana', 'GHA'));
        $manager->persist($country);

        // Gibraltar
        $country = new Country('Gibraltar', 'GI', 'GIB');
        $country->addRegion(new Region('Gibraltar', 'GIB'));
        $manager->persist($country);

        // Greece
        $country = new Country('Greece', 'GR', 'GRC');
        $country->addRegion(new Region('Aegean', 'Isl'));
        $country->addRegion(new Region('Attiki', 'ATT'));
        $country->addRegion(new Region('Central', 'Gre'));
        $country->addRegion(new Region('Crete', 'KRI'));
        $country->addRegion(new Region('Epirus', 'IPI'));
        $country->addRegion(new Region('Ionia', 'Isl'));
        $country->addRegion(new Region('Macedonia', 'MAK'));
        $country->addRegion(new Region('Peloponnesus', 'PEL'));
        $country->addRegion(new Region('Thessalia', 'THE'));
        $country->addRegion(new Region('Thrace', 'THR'));
        $manager->persist($country);

        // Greenland
        $country = new Country('Greenland', 'GL', 'GRL');
        $country->addRegion(new Region('Greenland', 'GL'));
        $manager->persist($country);

        // Grenada
        $country = new Country('Grenada', 'GD', 'GRD');
        $country->addRegion(new Region('Grenada', 'GJ'));
        $manager->persist($country);

        // Guadeloupe
        $country = new Country('Guadeloupe', 'GP', 'GLP');
        $country->addRegion(new Region('Guadeloupe', 'GUA'));
        $manager->persist($country);

        // Guam
        $country = new Country('Guam', 'GU', 'GUM');
        $manager->persist($country);

        // Guatemala
        $country = new Country('Guatemala', 'GT', 'GTM');
        $country->addRegion(new Region('Alta', 'Ver'));
        $country->addRegion(new Region('Baja', 'Ver'));
        $country->addRegion(new Region('Chimaltenango', 'CMT'));
        $country->addRegion(new Region('Chiquimula', 'CQM'));
        $country->addRegion(new Region('El', 'Pro'));
        $country->addRegion(new Region('Escuintla', 'ESC'));
        $country->addRegion(new Region('Guatemala', 'GUA'));
        $country->addRegion(new Region('Huehuetenango', 'HUE'));
        $country->addRegion(new Region('Izabal', 'IZA'));
        $country->addRegion(new Region('Jalapa', 'JAL'));
        $country->addRegion(new Region('Jutiapa', 'JUT'));
        $country->addRegion(new Region('Peten', 'PET'));
        $country->addRegion(new Region('Quetzaltenango', 'QUE'));
        $country->addRegion(new Region('Quiche', 'QUI'));
        $country->addRegion(new Region('Retalhuleu', 'RET'));
        $country->addRegion(new Region('Sacatepequez', 'SAC'));
        $country->addRegion(new Region('San', 'Mar'));
        $country->addRegion(new Region('Santa', 'Ros'));
        $country->addRegion(new Region('Solola', 'SOL'));
        $country->addRegion(new Region('Suchitepequez', 'SUC'));
        $country->addRegion(new Region('Totonicapan', 'TOT'));
        $country->addRegion(new Region('Zacapa', 'ZAC'));
        $manager->persist($country);

        // Guinea
        $country = new Country('Guinea', 'GN', 'GIN');
        $country->addRegion(new Region('Guinea', 'GUI'));
        $manager->persist($country);

        // Guinea-bissau
        $country = new Country('Guinea-bissau', 'GW', 'GNB');
        $country->addRegion(new Region('Guinea-Bissau', 'GUB'));
        $manager->persist($country);

        // Guyana
        $country = new Country('Guyana', 'GY', 'GUY');
        $country->addRegion(new Region('Guyana', 'GUY'));
        $manager->persist($country);

        // Haiti
        $country = new Country('Haiti', 'HT', 'HTI');
        $country->addRegion(new Region('Haiti', 'HAI'));
        $manager->persist($country);

        // Heard and Mc Donald Islands
        $country = new Country('Heard and Mc Donald Islands', 'HM', 'HMD');
        $manager->persist($country);

        // Honduras
        $country = new Country('Honduras', 'HN', 'HND');
        $country->addRegion(new Region('Atlantida', 'ATL'));
        $country->addRegion(new Region('Choluteca', 'CHO'));
        $country->addRegion(new Region('Colon', 'COL'));
        $country->addRegion(new Region('Comayagua', 'COM'));
        $country->addRegion(new Region('Copan', 'COP'));
        $country->addRegion(new Region('El', 'Par'));
        $country->addRegion(new Region('Francisco', 'Mor'));
        $country->addRegion(new Region('Gracias', 'a'));
        $country->addRegion(new Region('Intibuca', 'INT'));
        $country->addRegion(new Region('Islas', 'de'));
        $country->addRegion(new Region('La', 'Paz'));
        $country->addRegion(new Region('Lempira', 'LEM'));
        $country->addRegion(new Region('Ocotepeque', 'OCO'));
        $country->addRegion(new Region('Olancho', 'OLA'));
        $country->addRegion(new Region('Santa', 'Bar'));
        $country->addRegion(new Region('Valle', 'VAL'));
        $country->addRegion(new Region('Yoro', 'YOR'));
        $manager->persist($country);

        // Hong Kong
        $country = new Country('Hong Kong', 'HK', 'HKG');
        $manager->persist($country);

        // Hungary
        $country = new Country('Hungary', 'HU', 'HUN');
        $country->addRegion(new Region('Bacs-Kiskun', 'Meg'));
        $country->addRegion(new Region('Baranya', 'Meg'));
        $country->addRegion(new Region('Bekes', 'Meg'));
        $country->addRegion(new Region('Borsod-Abauj-Zemplen', 'Meg'));
        $country->addRegion(new Region('Budapest', 'Fov'));
        $country->addRegion(new Region('Csongrad', 'Meg'));
        $country->addRegion(new Region('Debrecen', 'Meg'));
        $country->addRegion(new Region('Fejer', 'Meg'));
        $country->addRegion(new Region('Gyor', 'Meg'));
        $country->addRegion(new Region('Gyor-Moson-Sopron', 'Meg'));
        $country->addRegion(new Region('Hajdu-Bihar', 'Meg'));
        $country->addRegion(new Region('Heves', 'Meg'));
        $country->addRegion(new Region('Jasz-Nagykun-Szolnok', 'Meg'));
        $country->addRegion(new Region('Komarom-Esztergom', 'Meg'));
        $country->addRegion(new Region('Miskolc', 'Meg'));
        $country->addRegion(new Region('Nograd', 'Meg'));
        $country->addRegion(new Region('Pecs', 'Meg'));
        $country->addRegion(new Region('Pest', 'Meg'));
        $country->addRegion(new Region('Somogy', 'Meg'));
        $country->addRegion(new Region('Szabolcs-Szatmar-Bereg', 'Meg'));
        $country->addRegion(new Region('Szeged', 'Meg'));
        $country->addRegion(new Region('Tolna', 'Meg'));
        $country->addRegion(new Region('Vas', 'Meg'));
        $country->addRegion(new Region('Veszprem', 'Meg'));
        $country->addRegion(new Region('Zala', 'Meg'));
        $manager->persist($country);

        // Iceland
        $country = new Country('Iceland', 'IS', 'ISL');
        $country->addRegion(new Region('Arnessysla', 'ARN'));
        $country->addRegion(new Region('Austur-Bardhastrandarsysla', 'ABA'));
        $country->addRegion(new Region('Austur-Hunavatnssysla', 'AHU'));
        $country->addRegion(new Region('Austur-Skaftafellssysla', 'ASK'));
        $country->addRegion(new Region('Borgarfjardharsysla', 'BOR'));
        $country->addRegion(new Region('Dalasysla', 'DAL'));
        $country->addRegion(new Region('Eyjafjardharsysla', 'EYJ'));
        $country->addRegion(new Region('Gullbringusysla', 'GUL'));
        $country->addRegion(new Region('Kjosarsysla', 'KJY'));
        $country->addRegion(new Region('Myrasysla', 'MYR'));
        $country->addRegion(new Region('Nordhur-Isafjardharsysla', 'NIS'));
        $country->addRegion(new Region('Nordhur-Mulasysla', 'NMU'));
        $country->addRegion(new Region('Nordhur-Thingeyjarsysla', 'NTY'));
        $country->addRegion(new Region('Rangarvallasysla', 'RNG'));
        $country->addRegion(new Region('Skagafjardharsysla', 'SKA'));
        $country->addRegion(new Region('Snaefellsnessysla-', 'og'));
        $country->addRegion(new Region('Strandasysla', 'STR'));
        $country->addRegion(new Region('Sudhur-Mulasysla', 'SMU'));
        $country->addRegion(new Region('Sudhur-Thingeijjar', 'STI'));
        $country->addRegion(new Region('Vestur-Bardhastrandarsysla', 'VBA'));
        $country->addRegion(new Region('Vestur-Hunavatnssysla', 'VHU'));
        $country->addRegion(new Region('Vestur-Isafjardharsysla', 'VIS'));
        $country->addRegion(new Region('Vestur-Skaftafellssysla', 'VSK'));
        $manager->persist($country);

        // India
        $country = new Country('India', 'IN', 'IND');
        $country->addRegion(new Region('Andaman', '&'));
        $country->addRegion(new Region('Andhra', 'Pra'));
        $country->addRegion(new Region('Arunachal', 'Pra'));
        $country->addRegion(new Region('Assam', 'ASS'));
        $country->addRegion(new Region('Bihar', 'BIH'));
        $country->addRegion(new Region('Chandigarh', 'CHA'));
        $country->addRegion(new Region('Dadra', '&'));
        $country->addRegion(new Region('Delhi', 'DEL'));
        $country->addRegion(new Region('Goa', 'GOA'));
        $country->addRegion(new Region('Gujarat', 'GUJ'));
        $country->addRegion(new Region('Haryana', 'HAR'));
        $country->addRegion(new Region('Himachal', 'Pra'));
        $country->addRegion(new Region('Jammu', '&'));
        $country->addRegion(new Region('Jharkhand', 'JHA'));
        $country->addRegion(new Region('Karnataka', 'KAR'));
        $country->addRegion(new Region('Kerala', 'KER'));
        $country->addRegion(new Region('Lakshadweep', 'LAK'));
        $country->addRegion(new Region('Madhya', 'Pra'));
        $country->addRegion(new Region('Maharashtra', 'MAH'));
        $country->addRegion(new Region('Manipur', 'MAN'));
        $country->addRegion(new Region('Meghalaya', 'MEG'));
        $country->addRegion(new Region('Mizoram', 'MIZ'));
        $country->addRegion(new Region('Nagaland', 'NAG'));
        $country->addRegion(new Region('Orissa', 'ORI'));
        $country->addRegion(new Region('Pondicherry', 'PON'));
        $country->addRegion(new Region('Punjab', 'PUN'));
        $country->addRegion(new Region('Rajasthan', 'RAJ'));
        $country->addRegion(new Region('Sikkim', 'SIK'));
        $country->addRegion(new Region('Tamil', 'Nad'));
        $country->addRegion(new Region('Tripura', 'TRI'));
        $country->addRegion(new Region('Uttar', 'Pra'));
        $country->addRegion(new Region('Uttaranchal', 'UAR'));
        $country->addRegion(new Region('West', 'Ben'));
        $manager->persist($country);

        // Indonesia
        $country = new Country('Indonesia', 'ID', 'IDN');
        $country->addRegion(new Region('Aceh', 'ACE'));
        $country->addRegion(new Region('Bali', 'BAL'));
        $country->addRegion(new Region('Bengkulu', 'BEN'));
        $country->addRegion(new Region('Jambi', 'JAM'));
        $country->addRegion(new Region('Jawa', 'Bar'));
        $country->addRegion(new Region('Jawa', 'Ten'));
        $country->addRegion(new Region('Jawa', 'Tim'));
        $country->addRegion(new Region('Kalimantan', 'Bar'));
        $country->addRegion(new Region('Kalimantan', 'Sel'));
        $country->addRegion(new Region('Kalimantan', 'Ten'));
        $country->addRegion(new Region('Kalimantan', 'Tim'));
        $country->addRegion(new Region('Lampung', 'LAM'));
        $country->addRegion(new Region('Maluku', 'MAL'));
        $country->addRegion(new Region('Nusa', 'Ten'));
        $country->addRegion(new Region('Nusa', 'Ten'));
        $country->addRegion(new Region('Papua', 'PAP'));
        $country->addRegion(new Region('Riau', 'RIA'));
        $country->addRegion(new Region('Sulawesi', 'Sel'));
        $country->addRegion(new Region('Sulawesi', 'Ten'));
        $country->addRegion(new Region('Sulawesi', 'Ten'));
        $country->addRegion(new Region('Sulawesi', 'Uta'));
        $country->addRegion(new Region('Sumatera', 'Bar'));
        $country->addRegion(new Region('Sumatera', 'Uta'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Yogyakarta', 'YOG'));
        $manager->persist($country);

        // Iran (Islamic Republic of)
        $country = new Country('Iran (Islamic Republic of)', 'IR', 'IRN');
        $country->addRegion(new Region('a', 'Bal'));
        $country->addRegion(new Region('ahall', 'va'));
        $country->addRegion(new Region('an-e', 'Gha'));
        $country->addRegion(new Region('an-e', 'Sha'));
        $country->addRegion(new Region('eh', 'va'));
        $country->addRegion(new Region('n', 'KOR'));
        $country->addRegion(new Region('n', 'KHU'));
        $country->addRegion(new Region('n', 'HOR'));
        $manager->persist($country);

        // Iraq
        $country = new Country('Iraq', 'IQ', 'IRQ');
        $country->addRegion(new Region('Anbar', 'ANB'));
        $country->addRegion(new Region('Arbil', 'ARB'));
        $country->addRegion(new Region('Babil', 'BAB'));
        $country->addRegion(new Region('Baghdad', 'BAG'));
        $country->addRegion(new Region('Basrah', 'BAS'));
        $country->addRegion(new Region('Dahuk', 'DAH'));
        $country->addRegion(new Region('Dhi', 'Qar'));
        $country->addRegion(new Region('Diyala', 'DIY'));
        $country->addRegion(new Region('Maysan', 'MAY'));
        $country->addRegion(new Region('Muthanna', 'MUT'));
        $country->addRegion(new Region('Najaf', 'NAJ'));
        $country->addRegion(new Region('Ninawa', 'NIN'));
        $country->addRegion(new Region('Qadisiyah', 'QAD'));
        $country->addRegion(new Region('Salah', 'ad'));
        $country->addRegion(new Region('Sulaymaniyah', 'SUL'));
        $country->addRegion(new Region('Wasit', 'WAS'));
        $manager->persist($country);

        // Ireland
        $country = new Country('Ireland', 'IE', 'IRL');
        $country->addRegion(new Region('Carlow', 'CAR'));
        $country->addRegion(new Region('Cavan', 'CAV'));
        $country->addRegion(new Region('Clare', 'CLA'));
        $country->addRegion(new Region('Cork', 'COR'));
        $country->addRegion(new Region('Donegal', 'DON'));
        $country->addRegion(new Region('Dublin', 'DUB'));
        $country->addRegion(new Region('Galway', 'GAL'));
        $country->addRegion(new Region('Kerry', 'KRY'));
        $country->addRegion(new Region('Kildare', 'KID'));
        $country->addRegion(new Region('Kilkenny', 'KIK'));
        $country->addRegion(new Region('Laois', 'LAO'));
        $country->addRegion(new Region('Leitrim', 'LEI'));
        $country->addRegion(new Region('Limerick', 'LIM'));
        $country->addRegion(new Region('Longford', 'LON'));
        $country->addRegion(new Region('Louth', 'LOU'));
        $country->addRegion(new Region('Mayo', 'MAY'));
        $country->addRegion(new Region('Meath', 'MEA'));
        $country->addRegion(new Region('Monaghan', 'MON'));
        $country->addRegion(new Region('Offaly', 'OFF'));
        $country->addRegion(new Region('Roscommon', 'ROS'));
        $country->addRegion(new Region('Sligo', 'SLI'));
        $country->addRegion(new Region('Tipperary', 'TIP'));
        $country->addRegion(new Region('Wicklow', 'UNK'));
        $country->addRegion(new Region('Waterford', 'WAT'));
        $country->addRegion(new Region('Westmeath', 'WES'));
        $country->addRegion(new Region('Wexford', 'WEX'));
        $country->addRegion(new Region('Wicklow', 'WIC'));
        $manager->persist($country);

        // Israel
        $country = new Country('Israel', 'IL', 'ISR');
        $country->addRegion(new Region('Central', 'Dis'));
        $country->addRegion(new Region('Haifa', 'Dis'));
        $country->addRegion(new Region('Jerusalem', 'Dis'));
        $country->addRegion(new Region('Northern', 'Dis'));
        $country->addRegion(new Region('Southern', 'Dis'));
        $country->addRegion(new Region('Tel', 'Avi'));
        $manager->persist($country);

        // Italy
        $country = new Country('Italy', 'IT', 'ITA');
        $country->addRegion(new Region('Abruzzi', 'ABR'));
        $country->addRegion(new Region('Basilicata', 'BAS'));
        $country->addRegion(new Region('Calabria', 'CAL'));
        $country->addRegion(new Region('Campania', 'CAM'));
        $country->addRegion(new Region('Emilia-Romagna', 'EMI'));
        $country->addRegion(new Region('Friuli-Venezia', 'Giu'));
        $country->addRegion(new Region('Lazio', 'LAZ'));
        $country->addRegion(new Region('Liguria', 'LIG'));
        $country->addRegion(new Region('Lombardia', 'LOM'));
        $country->addRegion(new Region('Marche', 'MAR'));
        $country->addRegion(new Region('Molise', 'MOL'));
        $country->addRegion(new Region('Piemonte', 'PIE'));
        $country->addRegion(new Region('Puglia', 'PUG'));
        $country->addRegion(new Region('Sardegna', 'SAR'));
        $country->addRegion(new Region('Sicilia', 'SIC'));
        $country->addRegion(new Region('Toscana', 'TOS'));
        $country->addRegion(new Region('Trentino-Alto', 'Adi'));
        $country->addRegion(new Region('Umbria', 'UMB'));
        $country->addRegion(new Region('Veneto', 'VEN'));
        $manager->persist($country);

        // Jamaica
        $country = new Country('Jamaica', 'JM', 'JAM');
        $country->addRegion(new Region('Clarendon', 'CLA'));
        $country->addRegion(new Region('Hanover', 'HAN'));
        $country->addRegion(new Region('Kingston', 'KIN'));
        $country->addRegion(new Region('Manchester', 'MAN'));
        $country->addRegion(new Region('Portland', 'POR'));
        $country->addRegion(new Region('Saint', 'And'));
        $country->addRegion(new Region('Saint', 'Ann'));
        $country->addRegion(new Region('Saint', 'Cat'));
        $country->addRegion(new Region('Saint', 'Eli'));
        $country->addRegion(new Region('Saint', 'Jam'));
        $country->addRegion(new Region('Saint', 'Mar'));
        $country->addRegion(new Region('Saint', 'Tho'));
        $country->addRegion(new Region('Trelawny', 'TRE'));
        $country->addRegion(new Region('Westmoreland', 'WML'));
        $manager->persist($country);

        // Japan
        $country = new Country('Japan', 'JP', 'JPN');
        $country->addRegion(new Region('Aichi', 'AIC'));
        $country->addRegion(new Region('Akita', 'AKI'));
        $country->addRegion(new Region('Aomori', 'AOM'));
        $country->addRegion(new Region('Chiba', 'CHI'));
        $country->addRegion(new Region('Ehime', 'EHI'));
        $country->addRegion(new Region('Fukui', 'FUI'));
        $country->addRegion(new Region('Fukuoka', 'FUA'));
        $country->addRegion(new Region('Fukushima', 'FUM'));
        $country->addRegion(new Region('Gifu', 'GIF'));
        $country->addRegion(new Region('Gumma', 'GUM'));
        $country->addRegion(new Region('Hiroshima', 'HIR'));
        $country->addRegion(new Region('Hokkaido', 'HOK'));
        $country->addRegion(new Region('Hyogo', 'HYO'));
        $country->addRegion(new Region('Ibaraki', 'IBA'));
        $country->addRegion(new Region('Ishikawa', 'ISH'));
        $country->addRegion(new Region('Iwate', 'IWA'));
        $country->addRegion(new Region('Kagawa', 'KAG'));
        $country->addRegion(new Region('Kagoshima', 'KAM'));
        $country->addRegion(new Region('Kanagawa', 'KAN'));
        $country->addRegion(new Region('Kochi', 'KOC'));
        $country->addRegion(new Region('Kumamoto', 'KUM'));
        $country->addRegion(new Region('Kyoto', 'KYO'));
        $country->addRegion(new Region('Mie', 'MIE'));
        $country->addRegion(new Region('Miyagi', 'MIG'));
        $country->addRegion(new Region('Miyazaki', 'MIZ'));
        $country->addRegion(new Region('Nagano', 'NAG'));
        $country->addRegion(new Region('Nagasaki', 'NAK'));
        $country->addRegion(new Region('Nara', 'NAR'));
        $country->addRegion(new Region('Niigata', 'NII'));
        $country->addRegion(new Region('Oita', 'OIT'));
        $country->addRegion(new Region('Okayama', 'OKA'));
        $country->addRegion(new Region('Okinawa', 'OKI'));
        $country->addRegion(new Region('Osaka', 'OSA'));
        $country->addRegion(new Region('Saga', 'SAG'));
        $country->addRegion(new Region('Saitama', 'SAI'));
        $country->addRegion(new Region('Shiga', 'SHG'));
        $country->addRegion(new Region('Shimane', 'SHM'));
        $country->addRegion(new Region('Shizuoka', 'SHZ'));
        $country->addRegion(new Region('Tochigi', 'TOC'));
        $country->addRegion(new Region('Tokushima', 'TOK'));
        $country->addRegion(new Region('Tokyo', 'TOY'));
        $country->addRegion(new Region('Tottori', 'TOT'));
        $country->addRegion(new Region('Toyama', 'TYM'));
        $country->addRegion(new Region('Wakayama', 'WAK'));
        $country->addRegion(new Region('Yamagata', 'YMT'));
        $country->addRegion(new Region('Yamaguchi', 'YMG'));
        $country->addRegion(new Region('Yamanashi', 'YMN'));
        $manager->persist($country);

        // Jordan
        $country = new Country('Jordan', 'JO', 'JOR');
        $country->addRegion(new Region('Jordan', 'JOR'));
        $manager->persist($country);

        // Kazakhstan
        $country = new Country('Kazakhstan', 'KZ', 'KAZ');
        $country->addRegion(new Region('Kazakhstan', 'KAZ'));
        $manager->persist($country);

        // Kenya
        $country = new Country('Kenya', 'KE', 'KEN');
        $country->addRegion(new Region('Central', 'CEN'));
        $country->addRegion(new Region('Coast', 'CST'));
        $country->addRegion(new Region('Eastern', 'EST'));
        $country->addRegion(new Region('Nairobi', 'NAI'));
        $country->addRegion(new Region('North', 'Eas'));
        $country->addRegion(new Region('Nyanza', 'NYA'));
        $country->addRegion(new Region('Rift', 'Val'));
        $country->addRegion(new Region('Western', 'WST'));
        $manager->persist($country);

        // Kiribati
        $country = new Country('Kiribati', 'KI', 'KIR');
        $country->addRegion(new Region('Kiribati', 'KIR'));
        $manager->persist($country);

        // Korea, North
        $country = new Country('Korea, North', 'KP', 'PRK');
        $manager->persist($country);

        // Korea, South
        $country = new Country('Korea, South', 'KR', 'KOR');
        $manager->persist($country);

        // Kuwait
        $country = new Country('Kuwait', 'KW', 'KWT');
        $country->addRegion(new Region('Al-Ahmadi', 'AHM'));
        $country->addRegion(new Region('Al-Farwaniyah', 'FAR'));
        $country->addRegion(new Region('Al-Kuwayt', 'KUW'));
        $country->addRegion(new Region('Bubiyan', '&'));
        $country->addRegion(new Region('Hawalli', 'HAW'));
        $manager->persist($country);

        // Kyrgyzstan
        $country = new Country('Kyrgyzstan', 'KG', 'KGZ');
        $country->addRegion(new Region('Kyrgyzstan', 'KYR'));
        $manager->persist($country);

        // Lao People's Democratic Republic
        $country = new Country('Lao People\'s Democratic Republic', 'LA', 'LAO');
        $country->addRegion(new Region('Laos', 'LAO'));
        $manager->persist($country);

        // Latvia
        $country = new Country('Latvia', 'LV', 'LVA');
        $country->addRegion(new Region('Latvia', 'LAT'));
        $manager->persist($country);

        // Lebanon
        $country = new Country('Lebanon', 'LB', 'LBN');
        $country->addRegion(new Region('Lebanon', 'LEB'));
        $manager->persist($country);

        // Lesotho
        $country = new Country('Lesotho', 'LS', 'LSO');
        $country->addRegion(new Region('Lesotho', 'LES'));
        $manager->persist($country);

        // Liberia
        $country = new Country('Liberia', 'LR', 'LBR');
        $country->addRegion(new Region('Liberia', 'LIB'));
        $manager->persist($country);

        // Libyan Arab Jamahiriya
        $country = new Country('Libyan Arab Jamahiriya', 'LY', 'LBY');
        $country->addRegion(new Region('Libya', 'LIB'));
        $manager->persist($country);

        // Liechtenstein
        $country = new Country('Liechtenstein', 'LI', 'LIE');
        $country->addRegion(new Region('Liechtenstein', 'LIE'));
        $manager->persist($country);

        // Lithuania
        $country = new Country('Lithuania', 'LT', 'LTU');
        $country->addRegion(new Region('Lithuania', 'LIT'));
        $manager->persist($country);

        // Luxembourg
        $country = new Country('Luxembourg', 'LU', 'LUX');
        $country->addRegion(new Region('Luxembourg', 'LUX'));
        $manager->persist($country);

        // Macau
        $country = new Country('Macau', 'MO', 'MAC');
        $manager->persist($country);

        // Macedonia
        $country = new Country('Macedonia', 'MK', 'MKD');
        $country->addRegion(new Region('Macedonia', 'MAC'));
        $manager->persist($country);

        // Madagascar
        $country = new Country('Madagascar', 'MG', 'MDG');
        $country->addRegion(new Region('Antananarivo', 'ANT'));
        $country->addRegion(new Region('Antsiranana', 'ASI'));
        $country->addRegion(new Region('Fianarantsoa', 'FIA'));
        $country->addRegion(new Region('Mahajanga', 'MAH'));
        $country->addRegion(new Region('Toamasina', 'TOA'));
        $country->addRegion(new Region('Toliary', 'TOL'));
        $manager->persist($country);

        // Malawi
        $country = new Country('Malawi', 'MW', 'MWI');
        $country->addRegion(new Region('Malawi', 'MAL'));
        $manager->persist($country);

        // Malaysia
        $country = new Country('Malaysia', 'MY', 'MYS');
        $country->addRegion(new Region('Johor', 'JOH'));
        $country->addRegion(new Region('Kedah', 'KED'));
        $country->addRegion(new Region('Kelantan', 'KEL'));
        $country->addRegion(new Region('Melaka', 'MEL'));
        $country->addRegion(new Region('Pahang', 'PAH'));
        $country->addRegion(new Region('Perak', 'PER'));
        $country->addRegion(new Region('Perlis', 'PES'));
        $country->addRegion(new Region('Pulau', 'Pin'));
        $country->addRegion(new Region('Sabah', 'SAB'));
        $country->addRegion(new Region('Sarawak', 'SAR'));
        $country->addRegion(new Region('Selangor', 'SEL'));
        $country->addRegion(new Region('Sembilan', 'SEM'));
        $country->addRegion(new Region('Terengganu', 'TER'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Wilayah', 'Per'));
        $manager->persist($country);

        // Maldives
        $country = new Country('Maldives', 'MV', 'MDV');
        $country->addRegion(new Region('Maldives', 'MAL'));
        $manager->persist($country);

        // Mali
        $country = new Country('Mali', 'ML', 'MLI');
        $country->addRegion(new Region('Mali', 'MAL'));
        $manager->persist($country);

        // Malta
        $country = new Country('Malta', 'MT', 'MLT');
        $country->addRegion(new Region('Malta', 'MAL'));
        $manager->persist($country);

        // Marshall Islands
        $country = new Country('Marshall Islands', 'MH', 'MHL');
        $manager->persist($country);

        // Martinique
        $country = new Country('Martinique', 'MQ', 'MTQ');
        $manager->persist($country);

        // Mauritania
        $country = new Country('Mauritania', 'MR', 'MRT');
        $country->addRegion(new Region('Mauritania', 'MAU'));
        $manager->persist($country);

        // Mauritius
        $country = new Country('Mauritius', 'MU', 'MUS');
        $country->addRegion(new Region('Mauritius', 'MAU'));
        $manager->persist($country);

        // Mayotte
        $country = new Country('Mayotte', 'YT', 'MYT');
        $country->addRegion(new Region('Mayotte', 'MAY'));
        $manager->persist($country);

        // Mexico
        $country = new Country('Mexico', 'MX', 'MEX');
        $country->addRegion(new Region('Aguascalientes', 'AGS'));
        $country->addRegion(new Region('Baja California', 'BCN'));
        $country->addRegion(new Region('Baja California Sur', 'BCS'));
        $country->addRegion(new Region('Campeche', 'CAM'));
        $country->addRegion(new Region('Coahuila', 'COA'));
        $country->addRegion(new Region('Colima', 'COL'));
        $country->addRegion(new Region('Chiapas', 'CHP'));
        $country->addRegion(new Region('Chihuahua', 'CHH'));
        $country->addRegion(new Region('Distrito Federal', 'DIF'));
        $country->addRegion(new Region('Durango', 'DUR'));
        $country->addRegion(new Region('Guanajuato', 'GUA'));
        $country->addRegion(new Region('Guerrero', 'GRO'));
        $country->addRegion(new Region('Hidalgo', 'HID'));
        $country->addRegion(new Region('Jalisco', 'JAL'));
        $country->addRegion(new Region('México', 'MEX'));
        $country->addRegion(new Region('Michoacán', 'MIC'));
        $country->addRegion(new Region('Morelos', 'MOR'));
        $country->addRegion(new Region('Nayarit', 'NAY'));
        $country->addRegion(new Region('Nuevo León', 'NLE'));
        $country->addRegion(new Region('Oaxaca', 'OAX'));
        $country->addRegion(new Region('Puebla', 'PUE'));
        $country->addRegion(new Region('Querétaro', 'QUE'));
        $country->addRegion(new Region('Quintana Roo', 'ROO'));
        $country->addRegion(new Region('San Luis Potosí', 'SLP'));
        $country->addRegion(new Region('Sinaloa', 'SIN'));
        $country->addRegion(new Region('Sonora', 'SON'));
        $country->addRegion(new Region('Tabasco', 'TAB'));
        $country->addRegion(new Region('Tamaulipas', 'TAM'));
        $country->addRegion(new Region('Tlaxcala', 'TLA'));
        $country->addRegion(new Region('Veracruz', 'VER'));
        $country->addRegion(new Region('Yucatán', 'YUC'));
        $country->addRegion(new Region('Zacatecas', 'ZAC'));
        $manager->persist($country);

        // Micronesia, Federated States of
        $country = new Country('Micronesia, Federated States of', 'FM', 'FSM');
        $country->addRegion(new Region('Micronesia', 'MIC'));
        $country->addRegion(new Region('Federated states of micronesia', 'FM'));
        $manager->persist($country);

        // Moldova, Republic of
        $country = new Country('Moldova, Republic of', 'MD', 'MDA');
        $country->addRegion(new Region('Moldova', 'MOL'));
        $manager->persist($country);

        // Monaco
        $country = new Country('Monaco', 'MC', 'MCO');
        $country->addRegion(new Region('Monaco', 'MON'));
        $manager->persist($country);

        // Mongolia
        $country = new Country('Mongolia', 'MN', 'MNG');
        $country->addRegion(new Region('Mongolia', 'MNG'));
        $manager->persist($country);

        // Montserrat
        $country = new Country('Montserrat', 'MS', 'MSR');
        $country->addRegion(new Region('Montserrat', 'MON'));
        $manager->persist($country);

        // Morocco
        $country = new Country('Morocco', 'MA', 'MAR');
        $country->addRegion(new Region('Macau', 'MAC'));
        $country->addRegion(new Region('Chaouia-Ouardigha', 'CHO'));
        $country->addRegion(new Region('Doukkala-Abda', 'DOA'));
        $country->addRegion(new Region('Fes-Boulemane', 'FEB'));
        $country->addRegion(new Region('Gharb-Chrarda-Beni', 'Hse'));
        $country->addRegion(new Region('Grand', 'Cas'));
        $country->addRegion(new Region('Marrakech-Tensift-El', 'Hao'));
        $country->addRegion(new Region('Meknes-Tafilalt', 'MET'));
        $country->addRegion(new Region('Rabat-Sale-Zemmour-Zaer', 'RSZ'));
        $country->addRegion(new Region('Sous-Massa-Draa', 'SMD'));
        $country->addRegion(new Region('Tanger-Tetouan', 'TAT'));
        $country->addRegion(new Region('Taza-Al', 'Hoc'));
        $manager->persist($country);

        // Mozambique
        $country = new Country('Mozambique', 'MZ', 'MOZ');
        $country->addRegion(new Region('Mozambique', 'MOZ'));
        $manager->persist($country);

        // Myanmar
        $country = new Country('Myanmar', 'MM', 'MMR');
        $country->addRegion(new Region('Ayeyarwady', 'AYE'));
        $country->addRegion(new Region('Bago', 'BAG'));
        $country->addRegion(new Region('Chin', 'CHI'));
        $country->addRegion(new Region('Kachin', 'KAC'));
        $country->addRegion(new Region('Kayah', 'KAH'));
        $country->addRegion(new Region('Kayin', 'KAN'));
        $country->addRegion(new Region('Magway', 'MAG'));
        $country->addRegion(new Region('Mandalay', 'MAN'));
        $country->addRegion(new Region('Mon', 'MON'));
        $country->addRegion(new Region('Rakhine', 'RAK'));
        $country->addRegion(new Region('Sagaing', 'SAG'));
        $country->addRegion(new Region('Shan', 'SHA'));
        $country->addRegion(new Region('Tanintharyi', 'TAN'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Namibia
        $country = new Country('Namibia', 'NA', 'NAM');
        $country->addRegion(new Region('Namibia', 'NAM'));
        $manager->persist($country);

        // Nauru
        $country = new Country('Nauru', 'NR', 'NRU');
        $country->addRegion(new Region('Nauru', 'NAU'));
        $manager->persist($country);

        // Nepal
        $country = new Country('Nepal', 'NP', 'NPL');
        $country->addRegion(new Region('Nepal', 'NEP'));
        $manager->persist($country);

        // Netherlands
        $country = new Country('Netherlands', 'NL', 'NLD');
        $country->addRegion(new Region('Drenthe', 'DRE'));
        $country->addRegion(new Region('Flevoland', 'FLE'));
        $country->addRegion(new Region('Friesland', 'FRI'));
        $country->addRegion(new Region('Gelderland', 'GEL'));
        $country->addRegion(new Region('Groningen', 'GRO'));
        $country->addRegion(new Region('Limburg', 'LIM'));
        $country->addRegion(new Region('Noord-Brabant', 'NBR'));
        $country->addRegion(new Region('Noord-Holland', 'NHL'));
        $country->addRegion(new Region('Overijssel', 'OVE'));
        $country->addRegion(new Region('Utrecht', 'UTR'));
        $country->addRegion(new Region('Zeeland', 'ZEE'));
        $country->addRegion(new Region('Zuid-Holland', 'ZHO'));
        $manager->persist($country);

        // Netherlands Antilles
        $country = new Country('Netherlands Antilles', 'AN', 'ANT');
        $manager->persist($country);

        // New Caledonia
        $country = new Country('New Caledonia', 'NC', 'NCL');
        $manager->persist($country);

        // New Zealand
        $country = new Country('New Zealand', 'NZ', 'NZL');
        $country->addRegion(new Region('Auckland', 'AUK'));
        $country->addRegion(new Region('Bay of Plenty', 'BOP'));
        $country->addRegion(new Region('Canterbury', 'CAN'));
        $country->addRegion(new Region('Gisborne', 'GIS'));
        $country->addRegion(new Region('Hawke\'s Bay', 'HKB'));
        $country->addRegion(new Region('Marlborough', 'MBH'));
        $country->addRegion(new Region('Manawatu-Wanganui', 'MWT'));
        $country->addRegion(new Region('Nelson', 'NSN'));
        $country->addRegion(new Region('Northland', 'NTL'));
        $country->addRegion(new Region('Otago', 'OTA'));
        $country->addRegion(new Region('Southland', 'STL'));
        $country->addRegion(new Region('Tasman', 'TAS'));
        $country->addRegion(new Region('Taranaki', 'TKI'));
        $country->addRegion(new Region('Wellington', 'WGN'));
        $country->addRegion(new Region('Waikato', 'WKO'));
        $country->addRegion(new Region('West Coast', 'WTC'));
        $manager->persist($country);

        // Nicaragua
        $country = new Country('Nicaragua', 'NI', 'NIC');
        $country->addRegion(new Region('Atlantico', 'Nor'));
        $country->addRegion(new Region('Atlantico', 'Sur'));
        $country->addRegion(new Region('Boaco', 'BOA'));
        $country->addRegion(new Region('Carazo', 'CAR'));
        $country->addRegion(new Region('Chinandega', 'CHI'));
        $country->addRegion(new Region('Chontales', 'CHO'));
        $country->addRegion(new Region('Esteli', 'EST'));
        $country->addRegion(new Region('Granada', 'GRA'));
        $country->addRegion(new Region('Jinotega', 'JIN'));
        $country->addRegion(new Region('Leon', 'LEO'));
        $country->addRegion(new Region('Madriz', 'MAD'));
        $country->addRegion(new Region('Managua', 'MAN'));
        $country->addRegion(new Region('Masaya', 'MAS'));
        $country->addRegion(new Region('Matagalpa', 'MAT'));
        $country->addRegion(new Region('Nueva', 'Seg'));
        $country->addRegion(new Region('Rio', 'San'));
        $country->addRegion(new Region('Rivas', 'RIV'));
        $manager->persist($country);

        // Niger
        $country = new Country('Niger', 'NE', 'NER');
        $country->addRegion(new Region('Agadez', 'AGA'));
        $country->addRegion(new Region('Diffa', 'DIF'));
        $country->addRegion(new Region('Dosso', 'DOS'));
        $country->addRegion(new Region('Maradi', 'MAR'));
        $country->addRegion(new Region('Niamey', 'NIA'));
        $country->addRegion(new Region('Tahoua', 'TAH'));
        $country->addRegion(new Region('Tillaberi', 'TIL'));
        $country->addRegion(new Region('Zinder', 'ZIN'));
        $manager->persist($country);

        // Nigeria
        $country = new Country('Nigeria', 'NG', 'NGA');
        $country->addRegion(new Region('Abuja', 'FC'));
        $country->addRegion(new Region('Adamawa', 'AD'));
        $country->addRegion(new Region('Bauchi', 'BA'));
        $country->addRegion(new Region('Benue', 'BE'));
        $country->addRegion(new Region('Borno', 'BO'));
        $country->addRegion(new Region('Delta', 'DE'));
        $country->addRegion(new Region('Gombe', 'GO'));
        $country->addRegion(new Region('Gongola', 'UNK'));
        $country->addRegion(new Region('Jigawa', 'JI'));
        $country->addRegion(new Region('Kaduna', 'KD'));
        $country->addRegion(new Region('Kano', 'KN'));
        $country->addRegion(new Region('Katsina', 'KT'));
        $country->addRegion(new Region('Kwara', 'KW'));
        $country->addRegion(new Region('Lagos', 'LA'));
        $country->addRegion(new Region('Nassarawa', 'NA'));
        $country->addRegion(new Region('Niger', 'NI'));
        $country->addRegion(new Region('Ogun', 'OG'));
        $country->addRegion(new Region('Oyo', 'OY'));
        $country->addRegion(new Region('Plateau', 'PL'));
        $country->addRegion(new Region('Sokoto', 'SO'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Zamfara', 'ZA'));
        $manager->persist($country);

        // Niue
        $country = new Country('Niue', 'NU', 'NIU');
        $country->addRegion(new Region('Niue', 'NIU'));
        $manager->persist($country);

        // Norfolk Island
        $country = new Country('Norfolk Island', 'NF', 'NFK');
        $manager->persist($country);

        // Northern Mariana Islands
        $country = new Country('Northern Mariana Islands', 'MP', 'MNP');
        $manager->persist($country);

        // Norway
        $country = new Country('Norway', 'NO', 'NOR');
        $country->addRegion(new Region('Akershus', 'AKE'));
        $country->addRegion(new Region('Aust-Agder', 'AAG'));
        $country->addRegion(new Region('Buskerud', 'BUS'));
        $country->addRegion(new Region('Finnmark', 'FIN'));
        $country->addRegion(new Region('Hedmark', 'HED'));
        $country->addRegion(new Region('Hordaland', 'HOR'));
        $country->addRegion(new Region('More', 'og'));
        $country->addRegion(new Region('Nord-Trondelag', 'NTR'));
        $country->addRegion(new Region('Nordland', 'NOR'));
        $country->addRegion(new Region('Oppland', 'OPP'));
        $country->addRegion(new Region('Oslo', 'OSL'));
        $country->addRegion(new Region('Ostfold', 'OFO'));
        $country->addRegion(new Region('Rogaland', 'ROG'));
        $country->addRegion(new Region('Sogn', 'og'));
        $country->addRegion(new Region('Sor-Trondelag', 'STR'));
        $country->addRegion(new Region('Telemark', 'TEL'));
        $country->addRegion(new Region('Troms', 'TRO'));
        $country->addRegion(new Region('Vest-Agder', 'VAG'));
        $country->addRegion(new Region('Vestfold', 'VFO'));
        $manager->persist($country);

        // Oman
        $country = new Country('Oman', 'OM', 'OMN');
        $country->addRegion(new Region('Oman', 'OMN'));
        $manager->persist($country);

        // Pakistan
        $country = new Country('Pakistan', 'PK', 'PAK');
        $country->addRegion(new Region('Balochistan', 'BAL'));
        $country->addRegion(new Region('Federally', 'Adm'));
        $country->addRegion(new Region('Islamabad', 'Cap'));
        $country->addRegion(new Region('North-West', 'Fro'));
        $country->addRegion(new Region('Punjab', 'PUN'));
        $country->addRegion(new Region('Sind', 'SIN'));
        $manager->persist($country);

        // Palau
        $country = new Country('Palau', 'PW', 'PLW');
        $country->addRegion(new Region('Palau', 'PAL'));
        $manager->persist($country);

        // Panama
        $country = new Country('Panama', 'PA', 'PAN');
        $country->addRegion(new Region('Bocas', 'del'));
        $country->addRegion(new Region('Chiriqui', 'CHI'));
        $country->addRegion(new Region('Colon', 'COL'));
        $country->addRegion(new Region('Darien', 'DAR'));
        $country->addRegion(new Region('Herrera', 'HER'));
        $country->addRegion(new Region('Kuna', 'Yal'));
        $country->addRegion(new Region('Los', 'San'));
        $country->addRegion(new Region('Panama', 'PAN'));
        $country->addRegion(new Region('Veraguas', 'VER'));
        $manager->persist($country);

        // Papua New Guinea
        $country = new Country('Papua New Guinea', 'PG', 'PNG');
        $manager->persist($country);

        // Paraguay
        $country = new Country('Paraguay', 'PY', 'PRY');
        $country->addRegion(new Region('Alto', 'Par'));
        $country->addRegion(new Region('Alto', 'Par'));
        $country->addRegion(new Region('Amambay', 'AMA'));
        $country->addRegion(new Region('Boqueron', 'BOQ'));
        $country->addRegion(new Region('Caaguazu', 'CGZ'));
        $country->addRegion(new Region('Caazapa', 'CZP'));
        $country->addRegion(new Region('Canindeyu', 'CAN'));
        $country->addRegion(new Region('Central', 'CEN'));
        $country->addRegion(new Region('Concepcion', 'CON'));
        $country->addRegion(new Region('Cordillera', 'COR'));
        $country->addRegion(new Region('Guaira', 'GUA'));
        $country->addRegion(new Region('Itapua', 'ITA'));
        $country->addRegion(new Region('Misiones', 'MIS'));
        $country->addRegion(new Region('Neembucu', 'NEE'));
        $country->addRegion(new Region('Paraguari', 'PAR'));
        $country->addRegion(new Region('Presidente', 'Hay'));
        $country->addRegion(new Region('San', 'Ped'));
        $manager->persist($country);

        // Peru
        $country = new Country('Peru', 'PE', 'PER');
        $country->addRegion(new Region('Amazonas', 'AMA'));
        $country->addRegion(new Region('Ancash', 'ANC'));
        $country->addRegion(new Region('Apurimac', 'APU'));
        $country->addRegion(new Region('Arequipa', 'ARE'));
        $country->addRegion(new Region('Ayacucho', 'AYA'));
        $country->addRegion(new Region('Cajamarca', 'CAJ'));
        $country->addRegion(new Region('Callao', 'CAL'));
        $country->addRegion(new Region('Cusco', 'CUS'));
        $country->addRegion(new Region('Huancavelica', 'HUA'));
        $country->addRegion(new Region('Huanuco', 'HUO'));
        $country->addRegion(new Region('Ica', 'ICA'));
        $country->addRegion(new Region('Junin', 'JUN'));
        $country->addRegion(new Region('La', 'Lib'));
        $country->addRegion(new Region('Lambayeque', 'LAM'));
        $country->addRegion(new Region('Lima', 'LIM'));
        $country->addRegion(new Region('Loreto', 'LOR'));
        $country->addRegion(new Region('Madre', 'de'));
        $country->addRegion(new Region('Moquegua', 'MOQ'));
        $country->addRegion(new Region('Pasco', 'PAS'));
        $country->addRegion(new Region('Piura', 'PIU'));
        $country->addRegion(new Region('Puno', 'PUN'));
        $country->addRegion(new Region('San', 'Mar'));
        $country->addRegion(new Region('Tacna', 'TAC'));
        $country->addRegion(new Region('Tumbes', 'TUM'));
        $country->addRegion(new Region('Ucayali', 'UCA'));
        $manager->persist($country);

        // Philippines
        $country = new Country('Philippines', 'PH', 'PHL');
        $country->addRegion(new Region('Abra', '01'));
        $country->addRegion(new Region('Agusan', 'del'));
        $country->addRegion(new Region('Agusan', 'del'));
        $country->addRegion(new Region('Aklan', '04'));
        $country->addRegion(new Region('Albay', '05'));
        $country->addRegion(new Region('Angeles', 'Cit'));
        $country->addRegion(new Region('Antique', '06'));
        $country->addRegion(new Region('Aurora', 'G8'));
        $country->addRegion(new Region('Bacolod', 'Cit'));
        $country->addRegion(new Region('Bago', 'Cit'));
        $country->addRegion(new Region('Baguio', 'Cit'));
        $country->addRegion(new Region('Basilan', '22'));
        $country->addRegion(new Region('Bataan', '07'));
        $country->addRegion(new Region('Batanes', '08'));
        $country->addRegion(new Region('Batangas', '09'));
        $country->addRegion(new Region('Batangas', 'Cit'));
        $country->addRegion(new Region('Benguet', '10'));
        $country->addRegion(new Region('Bohol', '11'));
        $country->addRegion(new Region('Bukidnon', '12'));
        $country->addRegion(new Region('Bulacan', '13'));
        $country->addRegion(new Region('Butuan', 'Cit'));
        $country->addRegion(new Region('Cabanatuan', 'Cit'));
        $country->addRegion(new Region('Cadiz', 'Cit'));
        $country->addRegion(new Region('Cagayan', '14'));
        $country->addRegion(new Region('Cagayan', 'de'));
        $country->addRegion(new Region('Calbayog', 'Cit'));
        $country->addRegion(new Region('Caloocan', 'Cit'));
        $country->addRegion(new Region('Camarines', 'Nor'));
        $country->addRegion(new Region('Camarines', 'Sur'));
        $country->addRegion(new Region('Camiguin', '17'));
        $country->addRegion(new Region('Canlaon', 'Cit'));
        $country->addRegion(new Region('Capiz', '18'));
        $country->addRegion(new Region('Catanduanes', '19'));
        $country->addRegion(new Region('Cavite', '20'));
        $country->addRegion(new Region('Cavite', 'Cit'));
        $country->addRegion(new Region('Cebu', '21'));
        $country->addRegion(new Region('Cebu', 'Cit'));
        $country->addRegion(new Region('City', 'of'));
        $country->addRegion(new Region('Cotabato', 'Cit'));
        $country->addRegion(new Region('Dagupan', 'Cit'));
        $country->addRegion(new Region('Danao', 'Cit'));
        $country->addRegion(new Region('Dapitan', 'Cit'));
        $country->addRegion(new Region('Davao', 'Cit'));
        $country->addRegion(new Region('Davao', 'del'));
        $country->addRegion(new Region('Davao', 'del'));
        $country->addRegion(new Region('Davao', 'Ori'));
        $country->addRegion(new Region('Dipolog', 'Cit'));
        $country->addRegion(new Region('Dumaguete', 'Cit'));
        $country->addRegion(new Region('Eastern', 'Sam'));
        $country->addRegion(new Region('General', 'San'));
        $country->addRegion(new Region('Gingoog', 'Cit'));
        $country->addRegion(new Region('Ifugao', '27'));
        $country->addRegion(new Region('Iligan', 'Cit'));
        $country->addRegion(new Region('Ilocos', 'Nor'));
        $country->addRegion(new Region('Ilocos', 'Sur'));
        $country->addRegion(new Region('Iloilo', '30'));
        $country->addRegion(new Region('Iloilo', 'Cit'));
        $country->addRegion(new Region('Iriga', 'Cit'));
        $country->addRegion(new Region('Isabela', '31'));
        $country->addRegion(new Region('Kalinga-Apayao', '32'));
        $country->addRegion(new Region('La', 'Car'));
        $country->addRegion(new Region('La', 'Uni'));
        $country->addRegion(new Region('Laguna', '33'));
        $country->addRegion(new Region('Lanao', 'del'));
        $country->addRegion(new Region('Lanao', 'del'));
        $country->addRegion(new Region('Laoag', 'Cit'));
        $country->addRegion(new Region('Lapu-Lapu', 'Cit'));
        $country->addRegion(new Region('Legaspi', 'Cit'));
        $country->addRegion(new Region('Leyte', '37'));
        $country->addRegion(new Region('Lipa', 'Cit'));
        $country->addRegion(new Region('Lucena', 'Cit'));
        $country->addRegion(new Region('Maguindanao', '56'));
        $country->addRegion(new Region('Mandaue', 'Cit'));
        $country->addRegion(new Region('Marawi', 'Cit'));
        $country->addRegion(new Region('Marinduque', '38'));
        $country->addRegion(new Region('Masbate', '39'));
        $country->addRegion(new Region('Mindoro', 'Occ'));
        $country->addRegion(new Region('Mindoro', 'Ori'));
        $country->addRegion(new Region('Misamis', 'Occ'));
        $country->addRegion(new Region('Misamis', 'Ori'));
        $country->addRegion(new Region('Mountain', 'Pro'));
        $country->addRegion(new Region('Naga', 'Cit'));
        $country->addRegion(new Region('Negros', 'Occ'));
        $country->addRegion(new Region('Negros', 'Ori'));
        $country->addRegion(new Region('North', 'Cot'));
        $country->addRegion(new Region('Northern', 'Sam'));
        $country->addRegion(new Region('Nueva', 'Eci'));
        $country->addRegion(new Region('Nueva', 'Viz'));
        $country->addRegion(new Region('Olongapo', 'Cit'));
        $country->addRegion(new Region('Ormoc', 'Cit'));
        $country->addRegion(new Region('Oroquieta', 'Cit'));
        $country->addRegion(new Region('Ozamis', 'Cit'));
        $country->addRegion(new Region('Pagadian', 'Cit'));
        $country->addRegion(new Region('Palawan', '49'));
        $country->addRegion(new Region('Palayan', 'Cit'));
        $country->addRegion(new Region('Pampanga', '50'));
        $country->addRegion(new Region('Pangasinan', '51'));
        $country->addRegion(new Region('Pasay', 'Cit'));
        $country->addRegion(new Region('Puerto', 'Pri'));
        $country->addRegion(new Region('Quezon', 'H2'));
        $country->addRegion(new Region('Quezon', 'Cit'));
        $country->addRegion(new Region('Quirino', '68'));
        $country->addRegion(new Region('Rizal', '53'));
        $country->addRegion(new Region('Romblon', '54'));
        $country->addRegion(new Region('Roxas', 'Cit'));
        $country->addRegion(new Region('Samar', '55'));
        $country->addRegion(new Region('San', 'Car'));
        $country->addRegion(new Region('San', 'Pab'));
        $country->addRegion(new Region('Silay', 'Cit'));
        $country->addRegion(new Region('Siquijor', '69'));
        $country->addRegion(new Region('Sorsogon', '58'));
        $country->addRegion(new Region('South', 'Cot'));
        $country->addRegion(new Region('Southern', 'Ley'));
        $country->addRegion(new Region('Sultan', 'Kud'));
        $country->addRegion(new Region('Sulu', '60'));
        $country->addRegion(new Region('Surigao', 'Cit'));
        $country->addRegion(new Region('Surigao', 'del'));
        $country->addRegion(new Region('Surigao', 'del'));
        $country->addRegion(new Region('Tacloban', 'Cit'));
        $country->addRegion(new Region('Tagaytay', 'Cit'));
        $country->addRegion(new Region('Tagbilaran', 'Cit'));
        $country->addRegion(new Region('Tangub', 'Cit'));
        $country->addRegion(new Region('Tarlac', '63'));
        $country->addRegion(new Region('Tawi-Tawi', '72'));
        $country->addRegion(new Region('Toledo', 'Cit'));
        $country->addRegion(new Region('Trece', 'Mar'));
        $country->addRegion(new Region('Zambales', '64'));
        $country->addRegion(new Region('Zamboanga', 'Cit'));
        $country->addRegion(new Region('Zamboanga', 'del'));
        $country->addRegion(new Region('Zamboanga', 'del'));
        $manager->persist($country);

        // Pitcairn
        $country = new Country('Pitcairn', 'PN', 'PCN');
        $manager->persist($country);

        // Poland
        $country = new Country('Poland', 'PL', 'POL');
        $country->addRegion(new Region('Dolnoslaskie', 'DOL'));
        $country->addRegion(new Region('Kujawsko-Pomorskie', 'KUJ'));
        $country->addRegion(new Region('Lodzkie', 'LOD'));
        $country->addRegion(new Region('Lubelskie', 'LUB'));
        $country->addRegion(new Region('Lubuskie', 'LBU'));
        $country->addRegion(new Region('Malopolskie', 'MAL'));
        $country->addRegion(new Region('Mazowieckie', 'MAZ'));
        $country->addRegion(new Region('Opolskie', 'OPO'));
        $country->addRegion(new Region('Podkarpackie', 'PDK'));
        $country->addRegion(new Region('Podlaskie', 'POD'));
        $country->addRegion(new Region('Pomorskie', 'POM'));
        $country->addRegion(new Region('Slaskie', 'SLA'));
        $country->addRegion(new Region('Swietokrzyskie', 'SWI'));
        $country->addRegion(new Region('Warminsko-Mazurskie', 'WAR'));
        $country->addRegion(new Region('Wielkopolskie', 'WIE'));
        $country->addRegion(new Region('Zachodniopomorskie', 'ZAC'));
        $manager->persist($country);

        // Portugal
        $country = new Country('Portugal', 'PT', 'PRT');
        $country->addRegion(new Region('Acores', 'ACO'));
        $country->addRegion(new Region('Alentejo', 'ALE'));
        $country->addRegion(new Region('Algarve', 'ALG'));
        $country->addRegion(new Region('Centro', 'CEN'));
        $country->addRegion(new Region('Lisboa', 'LIS'));
        $country->addRegion(new Region('Madeira', 'MAD'));
        $country->addRegion(new Region('Norte', 'NOR'));
        $manager->persist($country);

        // Puerto Rico
        $country = new Country('Puerto Rico', 'PR', 'PRI');
        $manager->persist($country);

        // Qatar
        $country = new Country('Qatar', 'QA', 'QAT');
        $country->addRegion(new Region('Qatar', 'QTR'));
        $manager->persist($country);

        // Reunion
        $country = new Country('Reunion', 'RE', 'REU');
        $country->addRegion(new Region('Reunion', 'RE'));
        $manager->persist($country);

        // Romania
        $country = new Country('Romania', 'RO', 'ROM');
        $country->addRegion(new Region('Alba', 'ALB'));
        $country->addRegion(new Region('Arad', 'ARA'));
        $country->addRegion(new Region('Arges', 'ARG'));
        $country->addRegion(new Region('Bacau', 'BAC'));
        $country->addRegion(new Region('Bihor', 'BIH'));
        $country->addRegion(new Region('Bistrita-Nasaud', 'BIS'));
        $country->addRegion(new Region('Botosani', 'BOT'));
        $country->addRegion(new Region('Braila', 'BRA'));
        $country->addRegion(new Region('Brasov', 'BRS'));
        $country->addRegion(new Region('Buzau', 'BUZ'));
        $country->addRegion(new Region('Calarasi', 'CAL'));
        $country->addRegion(new Region('Caras-Severin', 'CAR'));
        $country->addRegion(new Region('Cluj', 'CLU'));
        $country->addRegion(new Region('Constanta', 'CON'));
        $country->addRegion(new Region('Covasna', 'COV'));
        $country->addRegion(new Region('Dambovita', 'DAM'));
        $country->addRegion(new Region('Dolj', 'DOL'));
        $country->addRegion(new Region('Galati', 'GAL'));
        $country->addRegion(new Region('Giurgiu', 'GIU'));
        $country->addRegion(new Region('Gorj', 'GOR'));
        $country->addRegion(new Region('Harghita', 'HAR'));
        $country->addRegion(new Region('Hunedoara', 'HUN'));
        $country->addRegion(new Region('Ialomita', 'IAL'));
        $country->addRegion(new Region('Iasi', 'IAS'));
        $country->addRegion(new Region('Ilfov', 'ILF'));
        $country->addRegion(new Region('Maramures', 'MAR'));
        $country->addRegion(new Region('Mehedinti', 'MEH'));
        $country->addRegion(new Region('Municipiul', 'Buc'));
        $country->addRegion(new Region('Mures', 'MUR'));
        $country->addRegion(new Region('Neamt', 'NEA'));
        $country->addRegion(new Region('Olt', 'OLT'));
        $country->addRegion(new Region('Prahova', 'PRA'));
        $country->addRegion(new Region('Salaj', 'SAL'));
        $country->addRegion(new Region('Satu', 'Mar'));
        $country->addRegion(new Region('Sibiu', 'SIB'));
        $country->addRegion(new Region('Suceava', 'SUC'));
        $country->addRegion(new Region('Teleorman', 'TEL'));
        $country->addRegion(new Region('Timis', 'TIM'));
        $country->addRegion(new Region('Tulcea', 'TUL'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Valcea', 'VAL'));
        $country->addRegion(new Region('Vaslui', 'VAS'));
        $country->addRegion(new Region('Vrancea', 'VRA'));
        $manager->persist($country);

        // Russian Federation
        $country = new Country('Russian Federation', 'RU', 'RUS');
        $country->addRegion(new Region('Aginskiy', 'Bur'));
        $country->addRegion(new Region('Altayskiy', 'Kra'));
        $country->addRegion(new Region('Amurskaya', '05'));
        $country->addRegion(new Region('Astrakhanskaya', '07'));
        $country->addRegion(new Region('Belgorodskaya', '09'));
        $country->addRegion(new Region('Bryanskaya', '10'));
        $country->addRegion(new Region('Chechenskaya', 'CI'));
        $country->addRegion(new Region('Chelyabinskaya', '13'));
        $country->addRegion(new Region('Chitinskaya', '14'));
        $country->addRegion(new Region('Chukotskiy', '15'));
        $country->addRegion(new Region('Chuvashskaya', '16'));
        $country->addRegion(new Region('Evenkiyskiy', '18'));
        $country->addRegion(new Region('Gorod', 'Mos'));
        $country->addRegion(new Region('Gorod', 'San'));
        $country->addRegion(new Region('Irkutskaya', '20'));
        $country->addRegion(new Region('Ivanovskaya', '21'));
        $country->addRegion(new Region('Kabardino-Balkarskaya', '22'));
        $country->addRegion(new Region('Kaliningradskaya', '23'));
        $country->addRegion(new Region('Kaluzhskaya', '25'));
        $country->addRegion(new Region('Kamchatskaya', '26'));
        $country->addRegion(new Region('Karachayevo-Cherkesskaya', '27'));
        $country->addRegion(new Region('Kemerovskaya', '29'));
        $country->addRegion(new Region('Khabarovskiy', 'Kra'));
        $country->addRegion(new Region('Khanty-Mansiyskiy', '32'));
        $country->addRegion(new Region('Kirovskaya', '33'));
        $country->addRegion(new Region('Komi-Permyatskiy', '35'));
        $country->addRegion(new Region('Koryakskiy', '36'));
        $country->addRegion(new Region('Kostromskaya', '37'));
        $country->addRegion(new Region('Krasnodarskiy', 'Kra'));
        $country->addRegion(new Region('Krasnoyarskiy', 'Kra'));
        $country->addRegion(new Region('Kurganskaya', '40'));
        $country->addRegion(new Region('Kurskaya', '41'));
        $country->addRegion(new Region('Leningradskaya', '42'));
        $country->addRegion(new Region('Lipetskaya', '43'));
        $country->addRegion(new Region('Magadanskaya', '44'));
        $country->addRegion(new Region('Moskovskaya', '47'));
        $country->addRegion(new Region('Murmanskaya', '49'));
        $country->addRegion(new Region('Nenetskiy', '50'));
        $country->addRegion(new Region('Nizhegorodskaya', '51'));
        $country->addRegion(new Region('Novgorodskaya', '52'));
        $country->addRegion(new Region('Novosibirskaya', '53'));
        $country->addRegion(new Region('Omskaya', '54'));
        $country->addRegion(new Region('Orenburgskaya', '55'));
        $country->addRegion(new Region('Orlovskaya', '56'));
        $country->addRegion(new Region('Penzenskaya', '57'));
        $country->addRegion(new Region('Permskaya', '58'));
        $country->addRegion(new Region('Primorskiy', 'Kra'));
        $country->addRegion(new Region('Pskovskaya', '60'));
        $country->addRegion(new Region('Respublika', 'Ady'));
        $country->addRegion(new Region('Respublika', 'Alt'));
        $country->addRegion(new Region('Respublika', 'Bas'));
        $country->addRegion(new Region('Respublika', 'Bur'));
        $country->addRegion(new Region('Respublika', 'Dag'));
        $country->addRegion(new Region('Respublika', 'Kal'));
        $country->addRegion(new Region('Respublika', 'Kar'));
        $country->addRegion(new Region('Respublika', 'Kha'));
        $country->addRegion(new Region('Respublika', 'Kom'));
        $country->addRegion(new Region('Respublika', 'Mar'));
        $country->addRegion(new Region('Respublika', 'Mor'));
        $country->addRegion(new Region('Respublika', 'Sak'));
        $country->addRegion(new Region('Respublika', 'Sev'));
        $country->addRegion(new Region('Respublika', 'Tat'));
        $country->addRegion(new Region('Respublika', 'Tyv'));
        $country->addRegion(new Region('Rostovskaya', '61'));
        $country->addRegion(new Region('Ryazanskaya', '62'));
        $country->addRegion(new Region('Sakhalinskaya', '64'));
        $country->addRegion(new Region('Samarskaya', '65'));
        $country->addRegion(new Region('Saratovskaya', '67'));
        $country->addRegion(new Region('Smolenskaya', '69'));
        $country->addRegion(new Region('Sverdlovskaya', '71'));
        $country->addRegion(new Region('Tambovskaya', '72'));
        $country->addRegion(new Region('Taymyrskiy', 'Dol'));
        $country->addRegion(new Region('Tomskaya', '75'));
        $country->addRegion(new Region('Tverskaya', '77'));
        $country->addRegion(new Region('Tyumenskaya', '78'));
        $country->addRegion(new Region('Udmurtskaya', '80'));
        $country->addRegion(new Region('Vladimirskaya', '83'));
        $country->addRegion(new Region('Volgogradskaya', '84'));
        $country->addRegion(new Region('Vologodskaya', '85'));
        $country->addRegion(new Region('Voronezhskaya', '86'));
        $country->addRegion(new Region('Yamalo-Nenetskiy', '87'));
        $country->addRegion(new Region('Yaroslavskaya', '88'));
        $country->addRegion(new Region('Yevreyskaya', '89'));
        $manager->persist($country);

        // Rwanda
        $country = new Country('Rwanda', 'RW', 'RWA');
        $country->addRegion(new Region('Rwanda', 'RWA'));
        $manager->persist($country);

        // Saint Kitts and Nevis
        $country = new Country('Saint Kitts and Nevis', 'KN', 'KNA');
        $manager->persist($country);

        // Saint Lucia
        $country = new Country('Saint Lucia', 'LC', 'LCA');
        $manager->persist($country);

        // Saint Vincent and the Grenadines
        $country = new Country('Saint Vincent and the Grenadines', 'VC', 'VCT');
        $manager->persist($country);

        // Samoa
        $country = new Country('Samoa', 'WS', 'WSM');
        $country->addRegion(new Region('Samoa', 'SAM'));
        $manager->persist($country);

        // San Marino
        $country = new Country('San Marino', 'SM', 'SMR');
        $manager->persist($country);

        // Sao Tome and Principe
        $country = new Country('Sao Tome and Principe', 'ST', 'STP');
        $manager->persist($country);

        // Saudi Arabia
        $country = new Country('Saudi Arabia', 'SA', 'SAU');
        $manager->persist($country);

        // Senegal
        $country = new Country('Senegal', 'SN', 'SEN');
        $country->addRegion(new Region('Dakar', 'DAK'));
        $country->addRegion(new Region('Saint-Louis', 'STL'));
        $country->addRegion(new Region('Thies', 'THI'));
        $manager->persist($country);

        // Seychelles
        $country = new Country('Seychelles', 'SC', 'SYC');
        $country->addRegion(new Region('Seychelles', 'SEY'));
        $manager->persist($country);

        // Sierra Leone
        $country = new Country('Sierra Leone', 'SL', 'SLE');
        $manager->persist($country);

        // Singapore
        $country = new Country('Singapore', 'SG', 'SGP');
        $country->addRegion(new Region('Singapore', 'SNG'));
        $manager->persist($country);

        // Slovakia (Slovak Republic)
        $country = new Country('Slovakia (Slovak Republic)', 'SK', 'SVK');
        $country->addRegion(new Region('Slovakia', 'SLO'));
        $manager->persist($country);

        // Slovenia
        $country = new Country('Slovenia', 'SI', 'SVN');
        $country->addRegion(new Region('Slovenia', 'SLO'));
        $manager->persist($country);

        // Solomon Islands
        $country = new Country('Solomon Islands', 'SB', 'SLB');
        $manager->persist($country);

        // Somalia
        $country = new Country('Somalia', 'SO', 'SOM');
        $country->addRegion(new Region('Bakool', 'BAK'));
        $country->addRegion(new Region('Banaadir', 'BAN'));
        $country->addRegion(new Region('Bari', 'BAR'));
        $country->addRegion(new Region('Bay', 'BAY'));
        $country->addRegion(new Region('Gedo', 'GED'));
        $country->addRegion(new Region('Jubbada', 'Dhe'));
        $country->addRegion(new Region('Jubbada', 'Hoo'));
        $country->addRegion(new Region('Shabeellaha', 'Hoo'));
        $manager->persist($country);

        // South Africa
        $country = new Country('South Africa', 'ZA', 'ZAF');
        $country->addRegion(new Region('Eastern Cape', 'EC'));
        $country->addRegion(new Region('Free State', 'FS'));
        $country->addRegion(new Region('Gauteng', 'GT'));
        $country->addRegion(new Region('KwaZulu-Natal', 'NL'));
        $country->addRegion(new Region('Limpopo', 'LP'));
        $country->addRegion(new Region('Mpumalanga', 'MP'));
        $country->addRegion(new Region('Northern Cape', 'NC'));
        $country->addRegion(new Region('North-West', 'NW'));
        $country->addRegion(new Region('Western Cape', 'WC'));
        $manager->persist($country);

        // South Georgia
        $country = new Country('South Georgia', 'GS', 'SGS');
        $manager->persist($country);

        // Spain
        $country = new Country('Spain', 'ES', 'ESP');
        $country->addRegion(new Region('Andalucia', 'AND'));
        $country->addRegion(new Region('Aragon', 'ARA'));
        $country->addRegion(new Region('Asturias', 'AST'));
        $country->addRegion(new Region('Baleares', 'BAL'));
        $country->addRegion(new Region('Canarias', 'CAN'));
        $country->addRegion(new Region('Cantabria', 'CAR'));
        $country->addRegion(new Region('Castilla', 'y'));
        $country->addRegion(new Region('Castilla-La', 'Man'));
        $country->addRegion(new Region('Cataluna', 'CAT'));
        $country->addRegion(new Region('Ceuta', 'y'));
        $country->addRegion(new Region('Extremadura', 'EXT'));
        $country->addRegion(new Region('Galicia', 'GAL'));
        $country->addRegion(new Region('La', 'Rio'));
        $country->addRegion(new Region('Madrid', 'MAD'));
        $country->addRegion(new Region('Murcia', 'MUR'));
        $country->addRegion(new Region('Navarra', 'NAV'));
        $country->addRegion(new Region('Pais', 'Vas'));
        $country->addRegion(new Region('Valencia', 'VAL'));
        $manager->persist($country);

        // Sri Lanka
        $country = new Country('Sri Lanka', 'LK', 'LKA');
        $manager->persist($country);

        // St. Helena
        $country = new Country('St. Helena', 'SH', 'SHN');
        $manager->persist($country);

        // St. Pierre and Miquelon
        $country = new Country('St. Pierre and Miquelon', 'PM', 'SPM');
        $manager->persist($country);

        // Sudan
        $country = new Country('Sudan', 'SD', 'SDN');
        $country->addRegion(new Region('Sudan', 'SUD'));
        $manager->persist($country);

        // Suriname
        $country = new Country('Suriname', 'SR', 'SUR');
        $country->addRegion(new Region('Suriname', 'SUR'));
        $manager->persist($country);

        // Svalbard and Jan Mayen Islands
        $country = new Country('Svalbard and Jan Mayen Islands', 'SJ', 'SJM');
        $country->addRegion(new Region('Svalbard', 'SVL'));
        $manager->persist($country);

        // Swaziland
        $country = new Country('Swaziland', 'SZ', 'SWZ');
        $country->addRegion(new Region('Swaziland', 'SWZ'));
        $manager->persist($country);

        // Sweden
        $country = new Country('Sweden', 'SE', 'SWE');
        $country->addRegion(new Region('Blekinge', 'lan'));
        $country->addRegion(new Region('Dalarnas', 'lan'));
        $country->addRegion(new Region('Gavleborgs', 'lan'));
        $country->addRegion(new Region('Gotlands', 'lan'));
        $country->addRegion(new Region('Hallands', 'lan'));
        $country->addRegion(new Region('Jamtlands', 'lan'));
        $country->addRegion(new Region('Jonkopings', 'lan'));
        $country->addRegion(new Region('Kalmar', 'lan'));
        $country->addRegion(new Region('Kronobergs', 'lan'));
        $country->addRegion(new Region('Norrbottens', 'lan'));
        $country->addRegion(new Region('Orebro', 'lan'));
        $country->addRegion(new Region('Ostergotlands', 'lan'));
        $country->addRegion(new Region('Skane', 'lan'));
        $country->addRegion(new Region('Sodermanlands', 'lan'));
        $country->addRegion(new Region('Stockholms', 'lan'));
        $country->addRegion(new Region('Uppsala', 'lan'));
        $country->addRegion(new Region('Varmlands', 'lan'));
        $country->addRegion(new Region('Vasterbottens', 'lan'));
        $country->addRegion(new Region('Vasternorrlands', 'lan'));
        $country->addRegion(new Region('Vastmanlands', 'lan'));
        $country->addRegion(new Region('Vastra', 'Got'));
        $manager->persist($country);

        // Switzerland
        $country = new Country('Switzerland', 'CH', 'CHE');
        $country->addRegion(new Region('Switzerland', 'SWZ'));
        $manager->persist($country);

        // Syrian Arab Republic
        $country = new Country('Syrian Arab Republic', 'SY', 'SYR');
        $country->addRegion(new Region('Dar`a', 'DAR'));
        $country->addRegion(new Region('Dayr', 'az'));
        $country->addRegion(new Region('Dimashq', 'DIM'));
        $country->addRegion(new Region('Hamah', 'HAM'));
        $country->addRegion(new Region('Hasakah', 'HAS'));
        $country->addRegion(new Region('Hims', 'HIM'));
        $country->addRegion(new Region('Ladhiqiyah', 'LAD'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Taiwan
        $country = new Country('Taiwan', 'TW', 'TWN');
        $country->addRegion(new Region('Kao-hsiung', 'KAO'));
        $manager->persist($country);

        // Tajikistan
        $country = new Country('Tajikistan', 'TJ', 'TJK');
        $country->addRegion(new Region('Khatlon', 'KHA'));
        $country->addRegion(new Region('Mukhtori', 'Kuh'));
        $country->addRegion(new Region('Sughd', 'SUG'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Tanzania, United Republic of
        $country = new Country('Tanzania, United Republic of', 'TZ', 'TZA');
        $country->addRegion(new Region('Kagera', 'KAG'));
        $country->addRegion(new Region('Kigoma', 'KIG'));
        $country->addRegion(new Region('Mwanza', 'MWA'));
        $country->addRegion(new Region('Rukwa', 'RUK'));
        $country->addRegion(new Region('Shinyanga', 'SHI'));
        $country->addRegion(new Region('Tabora', 'TAB'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Thailand
        $country = new Country('Thailand', 'TH', 'THA');
        $country->addRegion(new Region('Bangkok', 'Met'));
        $country->addRegion(new Region('Central', 'CEN'));
        $country->addRegion(new Region('Northeastern', 'NEA'));
        $country->addRegion(new Region('Northern', 'NOR'));
        $country->addRegion(new Region('Southern', 'SOU'));
        $manager->persist($country);

        // Togo
        $country = new Country('Togo', 'TG', 'TGO');
        $country->addRegion(new Region('Togo', 'TOG'));
        $manager->persist($country);

        // Tokelau
        $country = new Country('Tokelau', 'TK', 'TKL');
        $country->addRegion(new Region('Tokelau', 'TOK'));
        $manager->persist($country);

        // Tonga
        $country = new Country('Tonga', 'TO', 'TON');
        $country->addRegion(new Region('Tonga', 'TNG'));
        $manager->persist($country);

        // Trinidad and Tobago
        $country = new Country('Trinidad and Tobago', 'TT', 'TTO');
        $manager->persist($country);

        // Tunisia
        $country = new Country('Tunisia', 'TN', 'TUN');
        $country->addRegion(new Region('Ariana', 'ARI'));
        $country->addRegion(new Region('Mahdia', 'MAH'));
        $country->addRegion(new Region('Sousse', 'SOU'));
        $country->addRegion(new Region('Tunis', 'TUN'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        // Turkey
        $country = new Country('Turkey', 'TR', 'TUR');
        $country->addRegion(new Region('Adana', 'ADA'));
        $country->addRegion(new Region('Ankara', 'ANK'));
        $country->addRegion(new Region('Antalya', 'ANT'));
        $country->addRegion(new Region('Aydin', 'AYD'));
        $country->addRegion(new Region('Bilecik', 'BIL'));
        $country->addRegion(new Region('Bursa', 'BUR'));
        $country->addRegion(new Region('Diyarbakir', 'DIY'));
        $country->addRegion(new Region('Erzurum', 'ERZ'));
        $country->addRegion(new Region('Hakkari', 'HAK'));
        $country->addRegion(new Region('Hatay', 'HAT'));
        $country->addRegion(new Region('Icel', 'ICE'));
        $country->addRegion(new Region('Isparta', 'ISP'));
        $country->addRegion(new Region('Istanbul', 'IST'));
        $country->addRegion(new Region('Izmir', 'IZM'));
        $country->addRegion(new Region('Karaman', 'KAM'));
        $country->addRegion(new Region('Kilis', 'KIL'));
        $country->addRegion(new Region('Kocaeli', 'KOC'));
        $country->addRegion(new Region('Konya', 'KON'));
        $country->addRegion(new Region('Manisa', 'MAN'));
        $country->addRegion(new Region('Nigde', 'NIG'));
        $country->addRegion(new Region('Sirnak', 'SIR'));
        $country->addRegion(new Region('Sivas', 'SIV'));
        $country->addRegion(new Region('Yalova', 'YAL'));
        $manager->persist($country);

        // Turkmenistan
        $country = new Country('Turkmenistan', 'TM', 'TKM');
        $country->addRegion(new Region('Ahal', 'AHL'));
        $country->addRegion(new Region('Balkan', 'BAL'));
        $country->addRegion(new Region('Dasoguz', 'DAS'));
        $country->addRegion(new Region('Lebap', 'LEB'));
        $country->addRegion(new Region('Mary', 'MAR'));
        $manager->persist($country);

        // Turks and Caicos Islands
        $country = new Country('Turks and Caicos Islands', 'TC', 'TCA');
        $manager->persist($country);

        // Tuvalu
        $country = new Country('Tuvalu', 'TV', 'TUV');
        $country->addRegion(new Region('Tuvalu', 'TUV'));
        $manager->persist($country);

        // Uganda
        $country = new Country('Uganda', 'UG', 'UGA');
        $country->addRegion(new Region('Uganda', 'UGA'));
        $manager->persist($country);

        // Ukraine
        $country = new Country('Ukraine', 'UA', 'UKR');
        $country->addRegion(new Region('Kyrm', 'KRY'));
        $country->addRegion(new Region('Misto', 'Kyy'));
        $manager->persist($country);

        // United Arab Emirates
        $country = new Country('United Arab Emirates', 'AE', 'ARE');
        $manager->persist($country);

        // United Kingdom
        $country = new Country('United Kingdom', 'GB', 'GBR');
        $country->addRegion(new Region('Cheshire', 'CHS'));
        $country->addRegion(new Region('Camden', 'CMD'));
        $country->addRegion(new Region('Cambridgeshire', 'CAM'));
        $country->addRegion(new Region('Calderdale', 'CLD'));
        $country->addRegion(new Region('Bury', 'BUR'));
        $country->addRegion(new Region('Buckinghamshire', 'BKM'));
        $country->addRegion(new Region('Bromley', 'BRY'));
        $country->addRegion(new Region('Bristol', 'BST'));
        $country->addRegion(new Region('Brighton and Hove', 'BNH'));
        $country->addRegion(new Region('Brent', 'BEN'));
        $country->addRegion(new Region('Bradford', 'BRD'));
        $country->addRegion(new Region('Bracknell Forest', 'BRC'));
        $country->addRegion(new Region('Bournemouth', 'BMH'));
        $country->addRegion(new Region('Bolton', 'BOL'));
        $country->addRegion(new Region('Blackpool', 'BPL'));
        $country->addRegion(new Region('Birmingham', 'BIR'));
        $country->addRegion(new Region('Bexley', 'BEX'));
        $country->addRegion(new Region('Bedfordshire', 'BDF'));
        $country->addRegion(new Region('Bath and North East Somerset', 'BAS'));
        $country->addRegion(new Region('Barnsley', 'BNS'));
        $country->addRegion(new Region('Barnet', 'BNE'));
        $country->addRegion(new Region('Cornwall', 'CON'));
        $country->addRegion(new Region('Coventry', 'COV'));
        $country->addRegion(new Region('Croydon', 'CRY'));
        $country->addRegion(new Region('Cumbria', 'CMA'));
        $country->addRegion(new Region('Darlington', 'DAL'));
        $country->addRegion(new Region('Derby', 'DER'));
        $country->addRegion(new Region('Derbyshire', 'DBY'));
        $country->addRegion(new Region('Devon', 'DEV'));
        $country->addRegion(new Region('Doncaster', 'DNC'));
        $country->addRegion(new Region('Dorset', 'DOR'));
        $country->addRegion(new Region('Dudley', 'DUD'));
        $country->addRegion(new Region('Durham', 'DUR'));
        $country->addRegion(new Region('Blackburn with Darwen', 'BBD'));
        $country->addRegion(new Region('Ealing', 'EAL'));
        $country->addRegion(new Region('East Riding of Yorkshire', 'ERY'));
        $country->addRegion(new Region('East Sussex', 'ESX'));
        $country->addRegion(new Region('Enfield', 'ENF'));
        $country->addRegion(new Region('Essex', 'ESS'));
        $country->addRegion(new Region('Gateshead', 'GAT'));
        $country->addRegion(new Region('Gloucestershire', 'GLS'));
        $country->addRegion(new Region('Greenwich', 'GRE'));
        $country->addRegion(new Region('Hackney', 'HCK'));
        $country->addRegion(new Region('Halton', 'HAL'));
        $country->addRegion(new Region('Hammersmith and Fulham', 'HMF'));
        $country->addRegion(new Region('Hampshire', 'HAM'));
        $country->addRegion(new Region('Haringey', 'HRY'));
        $country->addRegion(new Region('Harrow', 'HRW'));
        $country->addRegion(new Region('Hartlepool', 'HPL'));
        $country->addRegion(new Region('Havering', 'HAV'));
        $country->addRegion(new Region('Herefordshire, County of', 'HEF'));
        $country->addRegion(new Region('Hertfordshire', 'HRT'));
        $country->addRegion(new Region('Hillingdon', 'HIL'));
        $country->addRegion(new Region('Hounslow', 'HNS'));
        $country->addRegion(new Region('Isle of Wight', 'IOW'));
        $country->addRegion(new Region('Isles of Scilly', 'IOS'));
        $country->addRegion(new Region('Islington', 'ISL'));
        $country->addRegion(new Region('Kensington and Chelsea', 'KEC'));
        $country->addRegion(new Region('Kent', 'KEN'));
        $country->addRegion(new Region('Kingston upon Hull', 'KHL'));
        $country->addRegion(new Region('Kingston upon Thames', 'KTT'));
        $country->addRegion(new Region('Kirklees', 'KIR'));
        $country->addRegion(new Region('Knowsley', 'KWL'));
        $country->addRegion(new Region('Lambeth', 'LBH'));
        $country->addRegion(new Region('Lancashire', 'LAN'));
        $country->addRegion(new Region('Leeds', 'LDS'));
        $country->addRegion(new Region('Leicester', 'LCE'));
        $country->addRegion(new Region('Leicestershire', 'LEC'));
        $country->addRegion(new Region('Lewisham', 'LEW'));
        $country->addRegion(new Region('Lincolnshire', 'LIN'));
        $country->addRegion(new Region('Liverpool', 'LIV'));
        $country->addRegion(new Region('London', 'LND'));
        $country->addRegion(new Region('Luton', 'LUT'));
        $country->addRegion(new Region('Manchester', 'MAN'));
        $country->addRegion(new Region('Medway', 'MDW'));
        $country->addRegion(new Region('Merton', 'MRT'));
        $country->addRegion(new Region('Middlesbrough', 'MDB'));
        $country->addRegion(new Region('Milton Keynes', 'MIK'));
        $country->addRegion(new Region('Newcastle upon Tyne', 'NET'));
        $country->addRegion(new Region('Newham', 'NWM'));
        $country->addRegion(new Region('Norfolk', 'NFK'));
        $country->addRegion(new Region('North East Lincolnshire', 'NEL'));
        $country->addRegion(new Region('North Lincolnshire', 'NLN'));
        $country->addRegion(new Region('North Somerset', 'NSM'));
        $country->addRegion(new Region('North Tyneside', 'NTY'));
        $country->addRegion(new Region('North Yorkshire', 'NYK'));
        $country->addRegion(new Region('Northhamptonshire', 'NTH'));
        $country->addRegion(new Region('Northumerland', 'NBL'));
        $country->addRegion(new Region('Nottingham', 'NGM'));
        $country->addRegion(new Region('Nottinghamshire', 'NTT'));
        $country->addRegion(new Region('Oldham', 'OLD'));
        $country->addRegion(new Region('Oxfordshire', 'OXF'));
        $country->addRegion(new Region('Peterborough', 'PTE'));
        $country->addRegion(new Region('Plymouth', 'PLY'));
        $country->addRegion(new Region('Portsmouth', 'POR'));
        $country->addRegion(new Region('Reading', 'RDG'));
        $country->addRegion(new Region('Redbridge', 'RDB'));
        $country->addRegion(new Region('Redcar and Cleveland', 'RCC'));
        $country->addRegion(new Region('Richmond upon Thames', 'RIC'));
        $country->addRegion(new Region('Rochdale', 'RCH'));
        $country->addRegion(new Region('Rotherham', 'ROT'));
        $country->addRegion(new Region('Rutland', 'RUT'));
        $country->addRegion(new Region('St Helens', 'SHN'));
        $country->addRegion(new Region('Salford', 'SLF'));
        $country->addRegion(new Region('Sandwell', 'SAW'));
        $country->addRegion(new Region('Sefton', 'SFT'));
        $country->addRegion(new Region('Sheffield', 'SHF'));
        $country->addRegion(new Region('Shropeshire', 'SHR'));
        $country->addRegion(new Region('Slough', 'SLG'));
        $country->addRegion(new Region('Solihull', 'SOL'));
        $country->addRegion(new Region('Somerset', 'SOM'));
        $country->addRegion(new Region('South Gloucestershire', 'SGC'));
        $country->addRegion(new Region('South Tyneside', 'STY'));
        $country->addRegion(new Region('Southampton', 'STH'));
        $country->addRegion(new Region('Southend-on-Sea', 'SOS'));
        $country->addRegion(new Region('Southwark', 'SWK'));
        $country->addRegion(new Region('Staffordshire', 'STS'));
        $country->addRegion(new Region('Stockport', 'SKP'));
        $country->addRegion(new Region('Stockton-on-Tees', 'STE'));
        $country->addRegion(new Region('Suffolk', 'SFK'));
        $country->addRegion(new Region('Sunderland', 'SND'));
        $country->addRegion(new Region('Surrey', 'SRY'));
        $country->addRegion(new Region('Sutton', 'STN'));
        $country->addRegion(new Region('Swindon', 'SWD'));
        $country->addRegion(new Region('Tameside', 'TAM'));
        $country->addRegion(new Region('Telford and Wrekin', 'TFW'));
        $country->addRegion(new Region('Thurrock', 'THR'));
        $country->addRegion(new Region('Torbay', 'TOB'));
        $country->addRegion(new Region('Tower Hamlets', 'TWH'));
        $country->addRegion(new Region('Trafford', 'TRF'));
        $country->addRegion(new Region('Wakefield', 'WKF'));
        $country->addRegion(new Region('Walsall', 'WLL'));
        $country->addRegion(new Region('Waltham Forest', 'WFT'));
        $country->addRegion(new Region('Wandsworth', 'WND'));
        $country->addRegion(new Region('Warrington', 'WRT'));
        $country->addRegion(new Region('Warrwickshire', 'WAR'));
        $country->addRegion(new Region('West Berkshire', 'WBK'));
        $country->addRegion(new Region('West Sussex', 'WSX'));
        $country->addRegion(new Region('Westminster', 'WSM'));
        $country->addRegion(new Region('Wigan', 'WGN'));
        $country->addRegion(new Region('Wiltshire', 'WIL'));
        $country->addRegion(new Region('Windsor and Maidenhead', 'WNM'));
        $country->addRegion(new Region('Wirral', 'WRL'));
        $country->addRegion(new Region('Workingham', 'WOK'));
        $country->addRegion(new Region('Wolverhampton', 'WLV'));
        $country->addRegion(new Region('Worcestershire', 'WOR'));
        $country->addRegion(new Region('York', 'YOR'));
        $country->addRegion(new Region('Stoke-on-Trent', 'STE'));
        $country->addRegion(new Region('North Somerset', 'NSM'));
        $country->addRegion(new Region('Luton', 'LUT'));
        $country->addRegion(new Region('Hartlepool', 'HPL'));
        $country->addRegion(new Region('Poole', 'POL'));
        $country->addRegion(new Region('Isle of Anglesey', 'AGY'));
        $country->addRegion(new Region('Wrexham', 'WRX'));
        $manager->persist($country);

        // United States
        $country = new Country('United States', 'US', 'USA');
        $country->addRegion(new Region('Alabama', 'AL'));
        $country->addRegion(new Region('Alaska', 'AK'));
        $country->addRegion(new Region('American Samoa', 'AS'));
        $country->addRegion(new Region('Arizona', 'AZ'));
        $country->addRegion(new Region('Arkansas', 'AR'));
        $country->addRegion(new Region('California', 'CA'));
        $country->addRegion(new Region('Colorado', 'CO'));
        $country->addRegion(new Region('Connecticut', 'CT'));
        $country->addRegion(new Region('Delaware', 'DE'));
        $country->addRegion(new Region('District of Columbia', 'DC'));
        $country->addRegion(new Region('Florida', 'FL'));
        $country->addRegion(new Region('Georgia', 'GA'));
        $country->addRegion(new Region('Guam', 'GU'));
        $country->addRegion(new Region('Hawaii', 'HI'));
        $country->addRegion(new Region('Idaho', 'ID'));
        $country->addRegion(new Region('Illinois', 'IL'));
        $country->addRegion(new Region('Indiana', 'IN'));
        $country->addRegion(new Region('Iowa', 'IA'));
        $country->addRegion(new Region('Kansas', 'KS'));
        $country->addRegion(new Region('Kentucky', 'KY'));
        $country->addRegion(new Region('Louisiana', 'LA'));
        $country->addRegion(new Region('Maine', 'ME'));
        $country->addRegion(new Region('Maryland', 'MD'));
        $country->addRegion(new Region('Massachusetts', 'MA'));
        $country->addRegion(new Region('Michigan', 'MI'));
        $country->addRegion(new Region('Minnesota', 'MN'));
        $country->addRegion(new Region('Mississippi', 'MS'));
        $country->addRegion(new Region('Missouri', 'MO'));
        $country->addRegion(new Region('Montana', 'MT'));
        $country->addRegion(new Region('Nebraska', 'NE'));
        $country->addRegion(new Region('Nevada', 'NV'));
        $country->addRegion(new Region('New Hampshire', 'NH'));
        $country->addRegion(new Region('New Jersey', 'NJ'));
        $country->addRegion(new Region('New Mexico', 'NM'));
        $country->addRegion(new Region('New York', 'NY'));
        $country->addRegion(new Region('North Carolina', 'NC'));
        $country->addRegion(new Region('North Dakota', 'ND'));
        $country->addRegion(new Region('Northern Mariana Islands', 'MP'));
        $country->addRegion(new Region('Ohio', 'OH'));
        $country->addRegion(new Region('Oklahoma', 'OK'));
        $country->addRegion(new Region('Oregon', 'OR'));
        $country->addRegion(new Region('Pennsylvania', 'PA'));
        $country->addRegion(new Region('Puerto Rico', 'PR'));
        $country->addRegion(new Region('Rhode Island', 'RI'));
        $country->addRegion(new Region('South Carolina', 'SC'));
        $country->addRegion(new Region('South Dakota', 'SD'));
        $country->addRegion(new Region('Tennessee', 'TN'));
        $country->addRegion(new Region('Texas', 'TX'));
        $country->addRegion(new Region('United States Minor Outlying Islands', 'UM'));
        $country->addRegion(new Region('Utah', 'UT'));
        $country->addRegion(new Region('Vermont', 'VT'));
        $country->addRegion(new Region('Virgin Islands', 'VI'));
        $country->addRegion(new Region('Virginia', 'VA'));
        $country->addRegion(new Region('Washington', 'WA'));
        $country->addRegion(new Region('West Virginia', 'WV'));
        $country->addRegion(new Region('Wisconsin', 'WI'));
        $country->addRegion(new Region('Wyoming', 'WY'));
        $manager->persist($country);

        // Uruguay
        $country = new Country('Uruguay', 'UY', 'URY');
        $country->addRegion(new Region('Artigas', 'ART'));
        $country->addRegion(new Region('Canelones', 'CAN'));
        $country->addRegion(new Region('Cerro', 'Lar'));
        $country->addRegion(new Region('Colonia', 'COL'));
        $country->addRegion(new Region('Durazno', 'DUR'));
        $country->addRegion(new Region('Florida', 'FLO'));
        $country->addRegion(new Region('Lavalleja', 'LAV'));
        $country->addRegion(new Region('Maldonado', 'MAL'));
        $country->addRegion(new Region('Montevideo', 'MON'));
        $country->addRegion(new Region('Paysandu', 'PAY'));
        $country->addRegion(new Region('Rio', 'Neg'));
        $country->addRegion(new Region('Rivera', 'RIV'));
        $country->addRegion(new Region('Rocha', 'ROC'));
        $country->addRegion(new Region('Salto', 'SAL'));
        $country->addRegion(new Region('San', 'Jos'));
        $country->addRegion(new Region('Soriano', 'SOR'));
        $country->addRegion(new Region('Tacuarembo', 'TAC'));
        $country->addRegion(new Region('Treinta', 'y'));
        $manager->persist($country);

        // Uzbekistan
        $country = new Country('Uzbekistan', 'UZ', 'UZB');
        $country->addRegion(new Region('Andijon', 'AND'));
        $country->addRegion(new Region('Buxoro', 'BUX'));
        $country->addRegion(new Region('Jizzax', 'JIZ'));
        $country->addRegion(new Region('Namangan', 'NAM'));
        $country->addRegion(new Region('Navoiy', 'NAV'));
        $country->addRegion(new Region('Qashqadaryo', 'QAS'));
        $country->addRegion(new Region('Qoraqalpog`iston', 'QOR'));
        $country->addRegion(new Region('Samarqand', 'SAM'));
        $country->addRegion(new Region('Sirdaryo', 'SIR'));
        $country->addRegion(new Region('Surxondaryo', 'SUR'));
        $country->addRegion(new Region('Toshkent', 'TOS'));
        $country->addRegion(new Region('Toshkent', 'Sha'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Xorazm', 'XOR'));
        $manager->persist($country);

        // Vanuatu
        $country = new Country('Vanuatu', 'VU', 'VUT');
        $country->addRegion(new Region('Vanuatu', 'VAN'));
        $manager->persist($country);

        // Vatican City State (Holy See)
        $country = new Country('Vatican City State (Holy See)', 'VA', 'VAT');
        $manager->persist($country);

        // Venezuela
        $country = new Country('Venezuela', 'VE', 'VEN');
        $country->addRegion(new Region('Amazonas', 'AMA'));
        $country->addRegion(new Region('Anzoategui', 'ANZ'));
        $country->addRegion(new Region('Apure', 'APU'));
        $country->addRegion(new Region('Aragua', 'ARA'));
        $country->addRegion(new Region('Barinas', 'BAR'));
        $country->addRegion(new Region('Bolivar', 'BOL'));
        $country->addRegion(new Region('Carabobo', 'CAR'));
        $country->addRegion(new Region('Falcon', 'FAL'));
        $country->addRegion(new Region('Guarico', 'GUA'));
        $country->addRegion(new Region('Lara', 'LAR'));
        $country->addRegion(new Region('Merida', 'MER'));
        $country->addRegion(new Region('Miranda', 'MIR'));
        $country->addRegion(new Region('Monagas', 'MON'));
        $country->addRegion(new Region('Nueva', 'Esp'));
        $country->addRegion(new Region('Sucre', 'SUC'));
        $country->addRegion(new Region('Tachira', 'TAC'));
        $country->addRegion(new Region('Trujillo', 'TRU'));
        $country->addRegion(new Region('Vargas', 'VAR'));
        $country->addRegion(new Region('Yaracuy', 'YAR'));
        $country->addRegion(new Region('Zulia', 'ZUL'));
        $manager->persist($country);

        // Viet Nam
        $country = new Country('Viet Nam', 'VN', 'VNM');
        $country->addRegion(new Region('An', 'Gia'));
        $country->addRegion(new Region('Ba', 'Ria'));
        $country->addRegion(new Region('Bac', 'Gia'));
        $country->addRegion(new Region('Bac', 'Kan'));
        $country->addRegion(new Region('Bac', 'Lie'));
        $country->addRegion(new Region('Bac', 'Nin'));
        $country->addRegion(new Region('Ben', 'Tre'));
        $country->addRegion(new Region('Binh', 'Din'));
        $country->addRegion(new Region('Binh', 'Duo'));
        $country->addRegion(new Region('Binh', 'Phu'));
        $country->addRegion(new Region('Binh', 'Thu'));
        $country->addRegion(new Region('Ca', 'Mau'));
        $country->addRegion(new Region('Can', 'Tho'));
        $country->addRegion(new Region('Cao', 'Ban'));
        $country->addRegion(new Region('Da', 'Nan'));
        $country->addRegion(new Region('Dac', 'Lak'));
        $country->addRegion(new Region('Dong', 'Nai'));
        $country->addRegion(new Region('Dong', 'Tha'));
        $country->addRegion(new Region('Gia', 'Lai'));
        $country->addRegion(new Region('Ha', 'Gia'));
        $country->addRegion(new Region('Ha', 'Nam'));
        $country->addRegion(new Region('Ha', 'Tay'));
        $country->addRegion(new Region('Ha', 'Tin'));
        $country->addRegion(new Region('Hai', 'Duo'));
        $country->addRegion(new Region('Hoa', 'Bin'));
        $country->addRegion(new Region('Hung', 'Yen'));
        $country->addRegion(new Region('Khanh', 'Hoa'));
        $country->addRegion(new Region('Kien', 'Gia'));
        $country->addRegion(new Region('Kon', 'Tum'));
        $country->addRegion(new Region('Lai', 'Cha'));
        $country->addRegion(new Region('Lam', 'Don'));
        $country->addRegion(new Region('Lang', 'Son'));
        $country->addRegion(new Region('Lao', 'Cai'));
        $country->addRegion(new Region('Long', 'An'));
        $country->addRegion(new Region('Nam', 'Din'));
        $country->addRegion(new Region('Nghe', 'An'));
        $country->addRegion(new Region('Ninh', 'Bin'));
        $country->addRegion(new Region('Ninh', 'Thu'));
        $country->addRegion(new Region('Phu', 'Tho'));
        $country->addRegion(new Region('Phu', 'Yen'));
        $country->addRegion(new Region('Quang', 'Bin'));
        $country->addRegion(new Region('Quang', 'Nam'));
        $country->addRegion(new Region('Quang', 'Nga'));
        $country->addRegion(new Region('Quang', 'Nin'));
        $country->addRegion(new Region('Quang', 'Tri'));
        $country->addRegion(new Region('Soc', 'Tra'));
        $country->addRegion(new Region('Son', 'La'));
        $country->addRegion(new Region('Tay', 'Nin'));
        $country->addRegion(new Region('Thai', 'Bin'));
        $country->addRegion(new Region('Thai', 'Ngu'));
        $country->addRegion(new Region('Thanh', 'Hoa'));
        $country->addRegion(new Region('Thanh', 'Pho'));
        $country->addRegion(new Region('Thanh', 'Pho'));
        $country->addRegion(new Region('Thu', 'Do'));
        $country->addRegion(new Region('Thua', 'Thi'));
        $country->addRegion(new Region('Tien', 'Gia'));
        $country->addRegion(new Region('Tra', 'Vin'));
        $country->addRegion(new Region('Tuyen', 'Qua'));
        $country->addRegion(new Region('Vinh', 'Lon'));
        $country->addRegion(new Region('Vinh', 'Phu'));
        $country->addRegion(new Region('Yen', 'Bai'));
        $manager->persist($country);

        // Virgin Islands (British)
        $country = new Country('Virgin Islands (British)', 'VG', 'VGB');
        $manager->persist($country);

        // Virgin Islands (U.S.)
        $country = new Country('Virgin Islands (U.S.)', 'VI', 'VIR');
        $manager->persist($country);

        // Wallis and Futuna Islands
        $country = new Country('Wallis and Futuna Islands', 'WF', 'WLF');
        $manager->persist($country);

        // Western Sahara
        $country = new Country('Western Sahara', 'EH', 'ESH');
        $manager->persist($country);

        // Yemen
        $country = new Country('Yemen', 'YE', 'YEM');
        $country->addRegion(new Region('Yemen', 'YEM'));
        $manager->persist($country);

        // Yugoslavia
        $country = new Country('Yugoslavia', 'YU', 'YUG');
        $manager->persist($country);

        // Zaire
        $country = new Country('Zaire', 'ZR', 'ZAR');
        $manager->persist($country);

        // Zambia
        $country = new Country('Zambia', 'ZM', 'ZMB');
        $country->addRegion(new Region('Central', 'CEN'));
        $country->addRegion(new Region('Eastern', 'EAS'));
        $country->addRegion(new Region('Lusaka', 'LUS'));
        $country->addRegion(new Region('Southern', 'SOU'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $country->addRegion(new Region('Western', 'WES'));
        $manager->persist($country);

        // Zimbabwe
        $country = new Country('Zimbabwe', 'ZW', 'ZWE');
        $country->addRegion(new Region('Harare', 'HAR'));
        $country->addRegion(new Region('Manicaland', 'MNL'));
        $country->addRegion(new Region('Mashonaland', 'Eas'));
        $country->addRegion(new Region('Mashonaland', 'Wes'));
        $country->addRegion(new Region('Masvingo', 'MVG'));
        $country->addRegion(new Region('Matabeleland', 'Nor'));
        $country->addRegion(new Region('Matabeleland', 'Sou'));
        $country->addRegion(new Region('Midlands', 'MID'));
        $country->addRegion(new Region('Unknown', 'UNK'));
        $manager->persist($country);

        $manager->flush();
    }
}
