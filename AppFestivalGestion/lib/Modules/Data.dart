import 'package:eventsapp/Modules/Event.dart';
import 'package:flutter/material.dart';

const Color KAppColor = Color(0xffde554d);

List<Map> categories = [
  {
    "name": 'MUSIC',
    'icon': Icons.music_note,
  },

];

List<Event> weekendEvents = [
  Event(
    name: 'ACDC',
    image: 'assets/event1.jpg',
    date: '24 Dec',
    category: categories[0],
    location: 'Barclays Centre',
    fromTo: '19PM - 22PM',
    cost: '60-240\$',
    participants: 1947,
    duration: 3,
    ),

  Event(
    name: 'MUSE',
    image: 'assets/event0.jpg',
    date: '24 Dec',
    category: categories[0],
    location: 'Barclays Centre',
    fromTo: '19PM - 22PM',
    cost: '60-240\$',
    participants: 1947,
    duration: 3,
    ),
];

List<Event> upcomingHomeEvents = [
  Event(
    name: 'NINHO',
    image: 'assets/event0.jpg',
    date: '24 Dec',
    category: categories[0],
    location: 'Barclays Centre',
    fromTo: '19PM - 22PM',
    cost: '60-240\$',
    participants: 1947,
    duration: 3,
   ),
];
