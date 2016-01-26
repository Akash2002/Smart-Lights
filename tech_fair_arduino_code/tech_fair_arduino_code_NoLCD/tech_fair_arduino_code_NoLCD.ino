/*This is a code for controlling an led using
arduino. We will be writing complex code*/

/***********************************************************************/

/*Make note: Server is the ethernet shield which proccesses our command*/
/*  We are also using PHP and SQL in order to access it from anywhere  */
/*    The client is the browser where we request or produce commands   */

/***********************************************************************/

#include <SPI.h>          //Ethernet runs via SPI communications
#include <Ethernet.h>

//to control the ethernet shiel
//setting the ip address for the ethernet server 

char server[] = "52.10.227.118";
EthernetClient client;

//IPAddress ip(192,168,137,1);
//IPAddress myDns(192, 168, 1, 1);
//IPAddress gateway(192, 168, 1, 1);

int led = 7;
byte mac[]={
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED  //setting the mac address which is the hardware address
}; //80=HTTP   23=Telnet
//Setting up the base for the code in the void setup
int response;
void setup(){
  // Open serial communications and wait for port to open:
  pinMode(led,OUTPUT);
  Serial.begin(9600);
  //delay(1000);
  // start the Ethernet connection:
  
  //Serial.println(Ethernet.localIP());
  Ethernet.begin(mac);
  //Serial.println(Ethernet.localIP());
  delay(100);
  Serial.println("Krishna");
  // give the Ethernet shield a second to initialize:
  // if you get a connection, report back via serial:
  Serial.println(client.getSocketNumber());
  response = client.connect(server, 80);
  Serial.print("response=");
  Serial.println(response);
  Serial.println(client.getSocketNumber());
  if (response) {
    Serial.println("connected");
    // Make a HTTP request:
    client.println("GET /getstatus.php HTTP/1.1");
    client.println("Host: 52.10.227.118");
    client.println("Connection: close");
    client.println();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
  
}

void loop(){
  if (client.available()) 
  {
    char c = client.read();
    String strWord = "";

    Serial.print(c);
    if (c == '>')
    {
      c = client.read();
      while ( c != '<' )
      {
        strWord += c;
        c = client.read();
      }
      Serial.println (strWord);
      if (strWord == "ledon")
      {
        digitalWrite(led,HIGH);
        Serial.println("It is on");
        client.stop();
      }
      else if(strWord == "ledoff")
      {
        digitalWrite (led,LOW);
        Serial.println("It is off");
        client.stop();
      }
      strWord = "";
    }
  }
   
  // if the server's disconnected, stop the client:
  if (!client.connected()) 
  {
    client.stop();
//    delay(1000);    
    if (client.connect(server, 80)) 
    {
      Serial.println("connected");
      // Make a HTTP request:
      client.println("GET /getstatus.php HTTP/1.1");
      client.println("Host: 52.10.227.118");
      client.println("Connection: close");
      client.println();
    } 
    else 
    {
      // if you didn't get a connection to the server:
      Serial.println("connection failed");
    }
  } 
}

