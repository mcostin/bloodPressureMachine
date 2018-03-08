#include <MySignals.h>
#include "Wire.h"
#include "SPI.h"
#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //physical mac address
byte ip[] = { 192, 168, 1, 177 }; // ip in lan (that's what you need to use in your browser. ("192.168.1.178")
byte gateway[] = { 192, 168, 1, 1 }; // internet access via router
byte subnet[] = { 255, 255, 255, 0 }; //subnet mask
EthernetServer server(80); //server port

String readString;
String Dia,Sys,Pul,Res;
int x,y,z;

void setup()
{
	Serial.begin(19200);Ethernet.begin(mac, ip, gateway, subnet);
	server.begin();
	Serial.print("server is at ");
	Serial.println(Ethernet.localIP());
	MySignals.begin();
	MySignals.initSensorUART();
	MySignals.enableSensorUART(BLOODPRESSURE);
}

void loop()
{
	if (MySignals.getStatusBP())
	{
		delay(1000);
		if (MySignals.getBloodPressure() == 1)
		{
			MySignals.disableMuxUART();
			x=MySignals.bloodPressureData.diastolic;
			y=MySignals.bloodPressureData.systolic;
			z=MySignals.bloodPressureData.pulse;

			Dia= String("Diastolic: ")+x;
			Sys= String("Systolic: ")+y;
			Pul= String("Pulse: ")+z;
			Res= Dia+String(" ")+Sys+String(" ")+Pul;

			Serial.println(Res);

			MySignals.enableMuxUART();

		}
	}

	EthernetClient client = server.available();

	if (client)
	{
		while (client.connected())
		{
			if (client.available())
			{
				char c = client.read(); //read char by char HTTP request

				if (readString.length() < 100) //store characters to string
				{
					readString += c; //Serial.print(c);
				} 

			if (c == '\n') //if HTTP request has ended
			{
				Serial.println(readString); //print to serial monitor for debuging
				client.println("HTTP/1.1 200 OK"); //send new page
				client.println("Content-Type: text/html");
				client.println();
				client.println("<HTML>");
				client.println("<HEAD>");
				client.println("<meta name='apple-mobile-web-app-capable' content='yes' />");
				client.println("<meta name='apple-mobile-web-app-status-bar-style' content='black-translucent' />");
				client.println("<link rel='stylesheet' type='text/css' href='http://randomnerdtutorials.com/ethernetcss.css' />");
				client.println("<TITLE>TCC Mauricio e Matheus</TITLE>");
				client.println("</HEAD>");
				client.println("<BODY>");
				client.println("<H1>Medidor de Pressao</H1>");
				client.println("<br />");
				client.println("<br />");
				client.println("<H2>Trabalho de Conclusao de Curso</H2><br>");
				client.println("<H2>Mauricio Costin <br> Matheus Garcia</H2>");
				client.println("<br><br>");
				client.println(Res);
				client.println("</BODY>");
				client.println("</HTML>");
				delay(1);
				client.stop(); //stopping client
				readString = ""; //clearing string for next read
			}
			delay(1000);
		}
	}
}
