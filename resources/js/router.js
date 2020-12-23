import Home from "./components/Home";
import Test from "./components/Test";
import About from "./components/About";
import AddStudent from "./components/AddStudent";
import AddStaff from "./components/AddStaff";
import AddBook from "./components/AddBook";
import IssueBook from "./components/IssueBook";
import ReturnBook from "./components/ReturnBook";
import Report from "./components/Report";
import Statistics from "./components/Statistics";
export const routes = [
    {
        path:'/home',
        component:Home
    },
    {
        path:'/test',
        component:Test
    },
    {
        path:'/about',
        component:About
    },
    {
        path:'/add',
        component:AddStudent
    },
    {
        path:'/staff',
        component:AddStaff
    },
    {
        path:'/addbook',
        component:AddBook
    },
    {
         path:'/issuebook',
        component:IssueBook
    },
    {
        path:'/returnbook',
        component:ReturnBook
    } ,
    {
        path:'/report',
        component:Report
    },
    {
        path:'/',
        component:About
    },
    {
        path:'/statistics',
        component:Statistics
    },



];
