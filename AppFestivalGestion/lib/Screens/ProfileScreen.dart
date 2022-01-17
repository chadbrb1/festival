import 'package:eventsapp/Modules/Data.dart';
import 'package:eventsapp/Modules/Event.dart';
import 'package:eventsapp/Widgets/ProfileEventContainer.dart';
import 'package:flutter/material.dart';

class ProfileScreen extends StatefulWidget {
  @override
  _ProfileScreenState createState() => _ProfileScreenState();
}

class _ProfileScreenState extends State<ProfileScreen> {
  int _selected = 0;

  @override
  Widget build(BuildContext context) {
    return SafeArea(
        child: Scaffold(
      body: ListView(
        children: [
          Stack(
            children: [
              Container(
                height: 150,
                padding: EdgeInsets.all(30),
                color: Colors.black,
                child: Row(
                  children: [
                    CircleAvatar(
                      radius: 35,
                      backgroundImage: AssetImage(
                        'assets/moi.jpg',
                      ),
                    ),
                    SizedBox(width: 30),
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        Text(
                          'Chad Barbier',
                          style: TextStyle(
                            color: Colors.white,
                            fontSize: 25,
                          ),
                        ),
                        SizedBox(height: 10),
                        Row(
                          children: [
                            Icon(
                              Icons.location_on_outlined,
                              color: Colors.white,
                              size: 15,
                            ),

                          ],
                        )
                      ],
                    )
                  ],
                ),
              ),
              Positioned(
                right: 10,
                bottom: 20,
                child: Icon(
                  Icons.settings,
                  color: Colors.white,
                ),
              ),
            ],
          ),
          Container(
            padding: EdgeInsets.symmetric(vertical: 25),
            child: Row(
              children: [
                Expanded(
                  child: GestureDetector(
                    child: Text(
                      'A venir',
                      textAlign: TextAlign.center,
                      style: TextStyle(
                        color: _selected == 0 ? Colors.black : Colors.grey,
                        fontSize: 17,
                      ),
                    ),
                    onTap: () {
                      setState(() {
                        _selected = 0;
                      });
                    },
                  ),
                ),
                Expanded(
                  child: GestureDetector(

                    onTap: () {
                      setState(() {
                        _selected = 1;
                      });
                    },
                  ),
                ),
               
              ],
            ),
          ),

        ],
      ),
    ));
  }
}
