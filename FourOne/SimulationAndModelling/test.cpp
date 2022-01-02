#include <bits/stdc++.h>
#include <string>
#include <fstream>
using namespace std;

int main(){
    ifstream fin;
    fin.open("in.txt");
    if(!fin.is_open()){
        cout << "Error opening file" << endl;
        return 0;
    }else{
        string s;
        while(getline(fin, s)){
            cout << s << endl;
        }
    }
    

    // ofstream file;
    // file.open("out.txt");
    // string txt = "This is a text to be output";
    // file << txt <<endl;
    return 0;
}