/* dur to some technicale issues regarding Android studio this is a shared work between
* Abdelkarim Ameur and Famakan Camara
* You can check th efinal result in the drawables*/

package com.example.tp_abdelkarim_famakan


import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.activity.enableEdgeToEdge
import androidx.compose.foundation.Image
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxHeight
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.size
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Email
import androidx.compose.material.icons.filled.Phone
import androidx.compose.material.icons.filled.Share
import androidx.compose.material3.Icon
import androidx.compose.material3.Scaffold
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.vector.ImageVector
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.Font
import androidx.compose.ui.text.font.FontFamily
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.famakan_abdelkarim.R
import com.example.famakan_abdelkarim.R.font.caveat
import com.example.famakan_abdelkarim.ui.theme.Famakan_AbdelkarimTheme


class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContent {
            Famakan_AbdelkarimTheme {
                Scaffold(modifier = Modifier.fillMaxSize()) { innerPadding ->
                    Greeting(
                        fullname = "Abdelkarim Ameur",
                        number = "+212 6 46 59 13 45",
                        modifier = Modifier.padding(innerPadding)
                    )
                }
            }
        }
    }
}


@Composable
fun ContactLine(icon: ImageVector, text: String) {
    Row(
        verticalAlignment = Alignment.CenterVertically,
        modifier = Modifier.padding(vertical = 4.dp)
    ) {
        Icon(icon, contentDescription = null)
        Text(
            text = text,
            modifier = Modifier.padding(start = 12.dp),
            fontFamily = FontFamily(Font(caveat)),
            fontSize = 25.sp
        )
    }
}


@Composable
fun Greeting(fullname: String,number: String, modifier: Modifier = Modifier) {
    var image = painterResource(R.drawable.ana)
    val caveat = FontFamily(Font(caveat))
    Column(modifier=Modifier
        .fillMaxWidth()
        .fillMaxHeight()
        .padding(24.dp),
        verticalArrangement = Arrangement.SpaceBetween,
        horizontalAlignment = Alignment.CenterHorizontally
    ){
        Column(
            modifier=Modifier

                .padding(60.dp),
            horizontalAlignment = Alignment.CenterHorizontally,
            verticalArrangement = Arrangement.SpaceBetween

        ){
            Image(

                painter = image,
                contentDescription = "My picture",
                modifier=Modifier.size(150.dp)
                    .clip(RoundedCornerShape(30.dp))
            )
            Text(
                text = fullname,
                modifier = Modifier.padding(10.dp),
                fontFamily = caveat,
                fontSize=30.sp


            )
            Text(
                text = "Business card",
                fontSize=25.sp,
                fontFamily = caveat

            )
        }

        Column(
            modifier=Modifier

                .padding(
                    bottom = 150.dp),
            horizontalAlignment = Alignment.CenterHorizontally,
            verticalArrangement = Arrangement.SpaceBetween

        ){
            ContactLine(Icons.Default.Phone, number)
            ContactLine(Icons.Default.Share, "@LinkedIn : Kream2005")
            ContactLine(Icons.Default.Email, "abdelkarimameurameur@gmail.com")
        }

    }

}

@Preview(showBackground = true)
@Composable
fun GreetingPreview() {
    Famakan_AbdelkarimTheme {
        Greeting("Abdelkarim Ameur","+212 6 46 59 13 45")
    }
}

